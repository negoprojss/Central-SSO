<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>419 | Sesión expirada</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950 text-white">

<main class="relative flex min-h-screen items-center justify-center overflow-hidden px-6 py-12">

    <div class="absolute inset-0 bg-indigo-950/20"></div>

    <div class="relative z-10 w-full max-w-3xl text-center">

        <div class="mb-8 text-6xl">
            ⏱️
        </div>

        <div class="mb-6">

            <span class="bg-gradient-to-r from-indigo-400 to-cyan-400 bg-clip-text text-8xl font-black tracking-tighter text-transparent sm:text-9xl">
                419
            </span>

        </div>

        <h1 class="text-3xl font-bold sm:text-4xl">
            Tu sesión ha expirado
        </h1>

        <p class="mx-auto mt-5 max-w-xl text-lg leading-7 text-slate-400">
            Por seguridad, tu sesión ya no es válida.
            Vuelve a iniciar sesión para continuar.
        </p>

        <div class="mt-10">

            <a href="{{ route('login') }}"
               class="inline-flex rounded-xl bg-indigo-600 px-8 py-3.5 font-semibold transition hover:bg-indigo-500">

                🔑 Iniciar sesión

            </a>

        </div>

        <div class="mt-16 border-t border-slate-800 pt-6 text-sm text-slate-500">
            Central SSO · Error 419
        </div>

    </div>

</main>

</body>
</html>
