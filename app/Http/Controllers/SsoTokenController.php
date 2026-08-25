<?php

namespace App\Http\Controllers;

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

        if ($request->grant_type !== 'authorization_code') {
            return response()->json([
                'error' => 'unsupported_grant_type',
            ], 400);
        }

        $client = SsoClient::query()
            ->where('client_id', $request->client_id)
            ->where('active', true)
            ->first();

        if (!$client) {
            return response()->json([
                'error' => 'invalid_client',
            ], 401);
        }

        if (!Hash::check(
            $request->client_secret,
            $client->client_secret
        )) {
            return response()->json([
                'error' => 'invalid_client',
            ], 401);
        }

        if ($client->redirect_uri !== $request->redirect_uri) {
            return response()->json([
                'error' => 'invalid_redirect_uri',
            ], 400);
        }

        /*
         * Buscamos códigos no utilizados y no expirados
         * pertenecientes al cliente.
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

        if (!$authorizationCode) {
            return response()->json([
                'error' => 'invalid_grant',
            ], 400);
        }

        /*
         * Marcar código como utilizado.
         */
        $authorizationCode->update([
            'used_at' => now(),
        ]);

        /*
         * Crear token temporal.
         */
        $accessToken = Str::random(80);

        /*
         * Por ahora devolvemos el token.
         *
         * En el siguiente paso lo almacenaremos en una
         * tabla específica de tokens.
         */
        return response()->json([
            'access_token' => $accessToken,
            'token_type' => 'Bearer',
            'expires_in' => 3600,
        ]);
    }
}
