<?php

namespace App\Http\Controllers;

use App\Models\SsoClient;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
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

        return $this->approve(
            $client,
            $state
        );
    }

    /**
     * Aprobar autorización.
     */
    private function approve(
        SsoClient $client,
        string $state
    ): RedirectResponse {

        $code = Str::random(64);

        session([
            'sso.authorization_code' => [
                'code' => $code,
                'client_id' => $client->client_id,
                'user_id' => auth()->id(),
                'expires_at' => now()->addMinutes(2),
            ],
        ]);

        return redirect()->away(
            $client->redirect_uri
            . '?code=' . urlencode($code)
            . '&state=' . urlencode($state)
        );
    }
}
