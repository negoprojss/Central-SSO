
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>500 | Error interno</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950 text-white">

<main class="relative flex min-h-screen items-center justify-center overflow-hidden px-6 py-12">

    <div class="absolute -left-32 top-1/2 h-96 w-96 -translate-y-1/2 rounded-full bg-red-600/20 blur-3xl"></div>

    <div class="relative z-10 w-full max-w-3xl text-center">

        <div class="mb-8 text-6xl">
            ⚠️
        </div>

        <div class="mb-6">

            <span class="bg-gradient-to-r from-red-400 via-pink-400 to-purple-400 bg-clip-text text-8xl font-black tracking-tighter text-transparent sm:text-9xl">
                500
            </span>

        </div>

        <h1 class="text-3xl font-bold sm:text-4xl">
            Algo salió mal
        </h1>

        <p class="mx-auto mt-5 max-w-xl text-lg leading-7 text-slate-400">
            Nuestro servidor encontró un problema inesperado.
            Estamos trabajando para solucionarlo.
        </p>

        <div class="mt-10 flex justify-center">

            <a href="{{ url('/') }}"
               class="rounded-xl bg-indigo-600 px-8 py-3.5 font-semibold transition hover:bg-indigo-500">

                🏠 Volver al inicio

            </a>

        </div>

        <div class="mt-16 border-t border-slate-800 pt-6 text-sm text-slate-500">
            Central SSO · Error 500
        </div>

    </div>

</main>

</body>
</html>
