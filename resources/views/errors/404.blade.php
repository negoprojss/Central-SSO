<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Página no encontrada | Central SSO</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950 text-white">

    <main class="relative flex min-h-screen items-center justify-center overflow-hidden px-6 py-12">

        {{-- Fondos decorativos --}}
        <div class="absolute -left-32 -top-32 h-96 w-96 rounded-full bg-indigo-600/20 blur-3xl"></div>

        <div class="absolute -bottom-32 -right-32 h-96 w-96 rounded-full bg-purple-600/20 blur-3xl"></div>

        <div class="relative z-10 w-full max-w-3xl text-center">

            {{-- Logo --}}
            <div class="mb-8 flex justify-center">

                <div
                    class="flex h-16 w-16 items-center justify-center rounded-2xl bg-indigo-600 shadow-2xl shadow-indigo-600/30"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-5a2 2 0 00-2-2H6a2 2 0 00-2 2v5a2 2 0 002 2zm10-9V7a4 4 0 00-8 0v3h8z"
                        />
                    </svg>

                </div>

            </div>


            {{-- Código 404 --}}
            <div class="mb-6">

                <span
                    class="bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-8xl font-black tracking-tighter text-transparent sm:text-9xl"
                >
                    404
                </span>

            </div>


            {{-- Título --}}
            <h1 class="text-3xl font-bold tracking-tight sm:text-4xl">

                Página no encontrada

            </h1>


            {{-- Descripción --}}
            <p class="mx-auto mt-5 max-w-xl text-base leading-7 text-slate-400 sm:text-lg">

                Parece que esta dirección no existe o que la página
                que estás buscando fue movida.

            </p>


            {{-- Botones --}}
            <div class="mt-10 flex flex-col justify-center gap-4 sm:flex-row">

                <a
                    href="{{ url('/') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-6 py-3.5 font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500 hover:shadow-indigo-600/40"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h4m8-11v10a1 1 0 01-1 1h-4"
                        />
                    </svg>

                    Ir al inicio

                </a>


                <button
                    onclick="history.back()"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-700 bg-slate-900 px-6 py-3.5 font-semibold text-slate-200 transition hover:border-slate-600 hover:bg-slate-800"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"
                        />
                    </svg>

                    Regresar

                </button>

            </div>


            {{-- Información inferior --}}
            <div class="mt-16 border-t border-slate-800 pt-6">

                <div class="flex flex-col items-center justify-between gap-3 text-sm text-slate-500 sm:flex-row">

                    <span>
                        Central SSO
                    </span>

                    <span>
                        Error 404 · Página no encontrada
                    </span>

                </div>

            </div>

        </div>

    </main>

</body>
</html>
