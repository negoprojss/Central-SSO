<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Panel | Central SSO</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950 text-white">

    {{-- HEADER --}}
    <header class="border-b border-white/10 bg-slate-950/90">

        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

            {{-- LOGO --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-600">
                    🔐
                </div>

                <div>
                    <div class="font-bold">
                        Central SSO
                    </div>

                    <div class="text-xs text-slate-500">
                        Panel central
                    </div>
                </div>

            </a>


            {{-- USUARIO --}}
            <div class="flex items-center gap-4">

                <div class="hidden text-right sm:block">

                    <div class="text-sm font-medium">
                        {{ auth()->user()->name }}
                    </div>

                    <div class="text-xs text-slate-500">
                        {{ auth()->user()->email }}
                    </div>

                </div>


                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button
                        type="submit"
                        class="rounded-lg border border-white/10 px-4 py-2 text-sm text-slate-300 transition hover:bg-white/5 hover:text-white"
                    >
                        Cerrar sesión
                    </button>

                </form>

            </div>

        </div>

    </header>


    {{-- CONTENIDO --}}
    <main class="mx-auto max-w-7xl px-6 py-12">

        {{-- BIENVENIDA --}}
        <section class="mb-12">

            <p class="text-sm font-semibold uppercase tracking-widest text-indigo-400">
                Central SSO
            </p>

            <h1 class="mt-2 text-3xl font-bold sm:text-4xl">
                Bienvenido, {{ auth()->user()->name }}
            </h1>

            <p class="mt-3 text-slate-400">
                Selecciona una aplicación para continuar.
            </p>

        </section>


        {{-- APLICACIONES --}}
        <section>

            <div class="mb-6 flex items-center justify-between">

                <div>
                    <h2 class="text-xl font-bold">
                        Mis aplicaciones
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Aplicaciones disponibles para tu cuenta.
                    </p>
                </div>

            </div>


            {{-- AQUÍ POSTERIORMENTE SALDRÁN DESDE MYSQL --}}
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                @forelse ($applications as $application)

                        <a
                            href="{{ $application->url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group rounded-2xl border border-white/10 bg-white/[0.03] p-6 transition hover:-translate-y-1 hover:border-indigo-500/40 hover:bg-white/[0.05]"
                        >

                            <div class="flex items-center justify-between">

                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-600 font-bold">
                                    {{ $application->icon ?? strtoupper(substr($application->name, 0, 1)) }}
                                </div>

                                <span class="text-xl text-slate-600 transition group-hover:text-indigo-400">
                                    →
                                </span>

                            </div>

                            <h3 class="mt-6 text-xl font-bold">
                                {{ $application->name }}
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-slate-400">
                                {{ $application->description }}
                            </p>

                            <div class="mt-5 flex items-center gap-2 text-xs text-emerald-400">

                                <span class="h-2 w-2 rounded-full bg-emerald-400"></span>

                                Disponible

                            </div>

                        </a>

                        @empty

                    <div class="col-span-full rounded-2xl border border-dashed border-white/10 p-10 text-center">

                        <div class="text-4xl">
                            📦
                        </div>

                        <h3 class="mt-4 text-lg font-semibold">
                            No hay aplicaciones disponibles
                        </h3>

                        <p class="mt-2 text-sm text-slate-500">
                            Actualmente no tienes aplicaciones disponibles.
                        </p>

                    </div>

                @endforelse

            </div>

        </section>

    </main>

</body>

</html>
