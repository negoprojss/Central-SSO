<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión - Central SSO</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center">

    <div class="w-full max-w-md">

        <div class="bg-white shadow-xl rounded-2xl p-8">

            <div class="text-center mb-8">

                <h1 class="text-3xl font-bold text-gray-900">
                    Central SSO
                </h1>

                <p class="text-gray-500 mt-2">
                    Inicia sesión para acceder a tus sistemas
                </p>

            </div>

            @if ($errors->any())

                <div class="mb-5 rounded-lg bg-red-50 p-4 text-red-700">

                    @foreach ($errors->all() as $error)

                        <p>{{ $error }}</p>

                    @endforeach

                </div>

            @endif

            <form method="POST" action="{{ route('login') }}">

                @csrf

                <div class="mb-5">

                    <label
                        for="email"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        Correo electrónico
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-indigo-500 focus:ring-indigo-500"
                        placeholder="usuario@empresa.com"
                    >

                </div>

                <div class="mb-5">

                    <label
                        for="password"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        Contraseña
                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-indigo-500 focus:ring-indigo-500"
                        placeholder="••••••••"
                    >

                </div>

                <div class="flex items-center mb-6">

                    <input
                        id="remember"
                        type="checkbox"
                        name="remember"
                        class="rounded border-gray-300 text-indigo-600"
                    >

                    <label
                        for="remember"
                        class="ml-2 text-sm text-gray-600"
                    >
                        Recordarme
                    </label>

                </div>

                <button
                    type="submit"
                    class="w-full rounded-lg bg-indigo-600 px-4 py-3 font-semibold text-white hover:bg-indigo-700 transition"
                >
                    Iniciar sesión
                </button>

            </form>

        </div>

        <p class="text-center text-sm text-gray-500 mt-6">
            Central de autenticación
        </p>

    </div>

</body>
</html>
