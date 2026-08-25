<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>429 | Demasiadas solicitudes</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950 text-white">

<main class="flex min-h-screen items-center justify-center px-6">

    <div class="w-full max-w-3xl text-center">

        <div class="mb-8 text-6xl">
            🚦
        </div>

        <div class="mb-6">

            <span class="bg-gradient-to-r from-yellow-400 to-orange-400 bg-clip-text text-8xl font-black tracking-tighter text-transparent sm:text-9xl">
                429
            </span>

        </div>

        <h1 class="text-3xl font-bold sm:text-4xl">
            Demasiadas solicitudes
        </h1>

        <p class="mx-auto mt-5 max-w-xl text-lg leading-7 text-slate-400">
            Hemos recibido demasiadas solicitudes en poco tiempo.
            Espera unos segundos e inténtalo nuevamente.
        </p>

        <div class="mt-10">

            <button
                onclick="location.reload()"
                class="rounded-xl bg-indigo-600 px-8 py-3.5 font-semibold transition hover:bg-indigo-500"
            >
                ↻ Intentar nuevamente
            </button>

        </div>

        <div class="mt-16 border-t border-slate-800 pt-6 text-sm text-slate-500">
            Central SSO · Error 429
        </div>

    </div>

</main>

</body>
</html>
