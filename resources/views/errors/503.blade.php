<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>503 | Mantenimiento</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950 text-white">

<main class="relative flex min-h-screen items-center justify-center overflow-hidden px-6 py-12">

    <div class="absolute -right-32 -top-32 h-96 w-96 rounded-full bg-indigo-600/20 blur-3xl"></div>

    <div class="relative z-10 w-full max-w-3xl text-center">

        <div class="mb-8 text-6xl">
            🛠️
        </div>

        <div class="mb-6">

            <span class="bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-8xl font-black tracking-tighter text-transparent sm:text-9xl">
                503
            </span>

        </div>

        <h1 class="text-3xl font-bold sm:text-4xl">
            Estamos realizando mantenimiento
        </h1>

        <p class="mx-auto mt-5 max-w-xl text-lg leading-7 text-slate-400">
            Central SSO está temporalmente fuera de servicio
            mientras realizamos mejoras.
        </p>

        <div class="mx-auto mt-8 max-w-md">

            <div class="h-2 overflow-hidden rounded-full bg-slate-800">

                <div class="h-full w-2/3 animate-pulse rounded-full bg-indigo-500"></div>

            </div>

            <p class="mt-3 text-sm text-slate-500">
                Volveremos en breve.
            </p>

        </div>

        <div class="mt-16 border-t border-slate-800 pt-6 text-sm text-slate-500">
            Central SSO · Mantenimiento
        </div>

    </div>

</main>

</body>
</html>
