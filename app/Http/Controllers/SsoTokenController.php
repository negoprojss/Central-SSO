<?php

namespace App\Http\Controllers;

use App\Models\SsoAccessToken;
use App\Models\SsoAuthorizationCode;
use App\Models\SsoClient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SsoTokenController extends Controller
{
    /**
     * Intercambiar authorization code por access token.
     */
    public function token(Request $request): JsonResponse
    {
        $request->validate([
            'grant_type' => ['required', 'string'],
            'code' => ['required', 'string'],
            'client_id' => ['required', 'string'],
            'client_secret' => ['required', 'string'],
            'redirect_uri' => ['required', 'url'],
        ]);

        /*
         * Comprobar grant type.
         */
        if ($request->grant_type !== 'authorization_code') {
            return response()->json([
                'error' => 'unsupported_grant_type',
                'message' => 'El grant_type no es válido.',
            ], 400);
        }

        /*
         * Buscar cliente.
         */
        $client = SsoClient::query()
            ->where('client_id', $request->client_id)
            ->where('active', true)
            ->first();

        if (!$client) {
            return response()->json([
                'error' => 'invalid_client',
                'message' => 'Cliente SSO no válido.',
            ], 401);
        }

        /*
         * Comprobar client_secret.
         */
        if (!Hash::check(
            $request->client_secret,
            $client->client_secret
        )) {
            return response()->json([
                'error' => 'invalid_client',
                'message' => 'Client secret incorrecto.',
            ], 401);
        }

        /*
         * Comprobar redirect URI.
         */
        if ($client->redirect_uri !== $request->redirect_uri) {
            return response()->json([
                'error' => 'invalid_redirect_uri',
                'message' => 'Redirect URI incorrecta.',
            ], 400);
        }

        /*
         * Buscar authorization codes válidos.
         */
        $codes = SsoAuthorizationCode::query()
            ->where('client_id', $client->id)
            ->whereNull('used_at')
            ->where('expires_at', '>', now())
            ->latest()
            ->get();

        $authorizationCode = null;

        foreach ($codes as $candidate) {

            if (Hash::check(
                $request->code,
                $candidate->code_hash
            )) {
                $authorizationCode = $candidate;
                break;
            }
        }

        /*
         * Code inválido.
         */
        if (!$authorizationCode) {
            return response()->json([
                'error' => 'invalid_grant',
                'message' => 'Authorization code inválido o expirado.',
            ], 400);
        }

        /*
         * Verificar nuevamente redirect URI.
         */
        if ($authorizationCode->redirect_uri !== $request->redirect_uri) {

            return response()->json([
                'error' => 'invalid_grant',
                'message' => 'Redirect URI no coincide.',
            ], 400);
        }

        /*
         * Marcar authorization code como utilizado.
         */
        $authorizationCode->update([
            'used_at' => now(),
        ]);

        /*
         * Crear access token.
         */
        $accessToken = Str::random(80);

        SsoAccessToken::create([
            'token_hash' => Hash::make($accessToken),
            'client_id' => $client->id,
            'user_id' => $authorizationCode->user_id,
            'expires_at' => now()->addHour(),
        ]);

        /*
         * Respuesta OAuth-style.
         */
        return response()->json([
            'access_token' => $accessToken,
            'token_type' => 'Bearer',
            'expires_in' => 3600,
        ]);
    }
}
