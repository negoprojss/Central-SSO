<?php

namespace App\Http\Controllers;

use App\Models\SsoAuthorizationCode;
use App\Models\SsoClient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SsoAuthorizationController extends Controller
{
    /**
     * Iniciar autorización SSO.
     */
    public function authorize(Request $request): RedirectResponse
    {
        $request->validate([
            'client_id' => ['required', 'string'],
            'redirect_uri' => ['required', 'url'],
            'state' => ['nullable', 'string', 'max:500'],
        ]);

        $client = SsoClient::query()
            ->where('client_id', $request->client_id)
            ->where('active', true)
            ->first();

        if (!$client) {
            abort(403, 'Cliente SSO no válido.');
        }

        if ($client->redirect_uri !== $request->redirect_uri) {
            abort(403, 'Redirect URI no válida.');
        }

        $state = $request->state ?: Str::random(40);

        /*
         * Si el usuario no ha iniciado sesión,
         * guardamos la petición SSO y mandamos al login.
         */
        if (!auth()->check()) {

            session([
                'sso.authorization' => [
                    'client_id' => $client->client_id,
                    'redirect_uri' => $client->redirect_uri,
                    'state' => $state,
                ],
            ]);

            return redirect()->route('login');
        }

        return $this->createAuthorizationCode(
            $client,
            $state
        );
    }

    /**
     * Continuar autorización después del login.
     */
    public function continueAfterLogin(): ?RedirectResponse
    {
        $authorization = session('sso.authorization');

        if (!$authorization) {
            return null;
        }

        session()->forget('sso.authorization');

        $client = SsoClient::query()
            ->where('client_id', $authorization['client_id'])
            ->where('active', true)
            ->first();

        if (!$client) {
            abort(403, 'Cliente SSO no válido.');
        }

        if ($client->redirect_uri !== $authorization['redirect_uri']) {
            abort(403, 'Redirect URI no válida.');
        }

        return $this->createAuthorizationCode(
            $client,
            $authorization['state']
        );
    }

    /**
     * Crear authorization code.
     */
    private function createAuthorizationCode(
        SsoClient $client,
        string $state
    ): RedirectResponse {

        $code = Str::random(80);

        SsoAuthorizationCode::create([
            'code_hash' => Hash::make($code),
            'client_id' => $client->id,
            'user_id' => auth()->id(),
            'redirect_uri' => $client->redirect_uri,
            'expires_at' => now()->addMinutes(2),
        ]);

        return redirect()->away(
            $client->redirect_uri
            . '?code=' . urlencode($code)
            . '&state=' . urlencode($state)
        );
    }
}
