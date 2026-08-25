<?php

namespace App\Http\Controllers;

use App\Models\SsoAccessToken;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SsoUserController extends Controller
{
    /**
     * Obtener información del usuario autenticado por SSO.
     */
    public function user(Request $request): JsonResponse
    {
        /*
         * Obtener Authorization header.
         */
        $authorization = $request->header('Authorization');

        if (!$authorization) {
            return response()->json([
                'error' => 'missing_token',
                'message' => 'No se proporcionó un access token.',
            ], 401);
        }

        /*
         * Comprobar formato Bearer.
         */
        if (!preg_match(
            '/^Bearer\s+(.+)$/i',
            $authorization,
            $matches
        )) {
            return response()->json([
                'error' => 'invalid_token',
                'message' => 'Formato de token inválido.',
            ], 401);
        }

        $token = $matches[1];

        /*
         * Buscar tokens activos.
         */
        $tokens = SsoAccessToken::query()
            ->whereNull('revoked_at')
            ->where('expires_at', '>', now())
            ->latest()
            ->get();

        $accessToken = null;

        foreach ($tokens as $candidate) {

            if (Hash::check(
                $token,
                $candidate->token_hash
            )) {
                $accessToken = $candidate;
                break;
            }
        }

        /*
         * Token inválido.
         */
        if (!$accessToken) {
            return response()->json([
                'error' => 'invalid_token',
                'message' => 'El access token no es válido o expiró.',
            ], 401);
        }

        /*
         * Obtener usuario.
         */
        $user = $accessToken->user;

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }
}
