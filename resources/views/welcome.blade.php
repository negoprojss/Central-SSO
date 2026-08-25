@extends('layouts.app')

@section('title', 'Central SSO')

@section('content')

<div class="min-h-screen">

    <!-- NAVBAR -->

    <nav class="border-b border-white/10">

        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5">

            <div class="text-xl font-bold">
                Central SSO
            </div>

            <a
                href="/login"
                class="rounded-lg bg-indigo-600 px-5 py-2.5 font-semibold transition hover:bg-indigo-500"
            >
                Iniciar sesión
            </a>

        </div>

    </nav>


    <!-- HERO -->

    <main>

        <section class="mx-auto max-w-7xl px-6 py-24">

            <div class="max-w-3xl">

                <span
                    class="rounded-full bg-indigo-500/10 px-4 py-2 text-sm text-indigo-300"
                >
                    Plataforma central de autenticación
                </span>

                <h1
                    class="mt-8 text-5xl font-bold tracking-tight sm:text-7xl"
                >
                    Un solo inicio de sesión para todos tus sistemas.
                </h1>

                <p
                    class="mt-8 text-lg leading-8 text-slate-300"
                >
                    Accede a las aplicaciones de tu empresa
                    utilizando una única cuenta.
                </p>

                <div class="mt-10 flex flex-wrap gap-4">

                    <a
                        href="/login"
                        class="rounded-xl bg-indigo-600 px-6 py-3 font-semibold transition hover:bg-indigo-500"
                    >
                        Entrar al portal
                    </a>

                    <a
                        href="#aplicaciones"
                        class="rounded-xl border border-white/10 px-6 py-3 font-semibold transition hover:bg-white/5"
                    >
                        Ver aplicaciones
                    </a>

                </div>

            </div>

        </section>


        <!-- APLICACIONES -->

        <section
            id="aplicaciones"
            class="border-t border-white/10 bg-slate-900"
        >

            <div class="mx-auto max-w-7xl px-6 py-20">

                <div class="mb-12">

                    <h2 class="text-3xl font-bold">
                        Una plataforma para todos tus sistemas
                    </h2>

                    <p class="mt-3 text-slate-400">
                        Administra el acceso desde un único lugar.
                    </p>

                </div>


                <div class="grid gap-6 md:grid-cols-3">


                    <!-- VENTAS -->

                    <div
                        class="rounded-2xl border border-white/10 bg-white/5 p-6 transition hover:border-indigo-500"
                    >

                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-600 text-lg font-bold"
                        >
                            V
                        </div>

                        <h3 class="mt-6 text-xl font-semibold">
                            Ventas
                        </h3>

                        <p class="mt-3 text-slate-400">
                            Administración de ventas,
                            clientes y operaciones comerciales.
                        </p>

                    </div>


                    <!-- INVENTARIO -->

                    <div
                        class="rounded-2xl border border-white/10 bg-white/5 p-6 transition hover:border-emerald-500"
                    >

                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-600 text-lg font-bold"
                        >
                            I
                        </div>

                        <h3 class="mt-6 text-xl font-semibold">
                            Inventario
                        </h3>

                        <p class="mt-3 text-slate-400">
                            Control de productos,
                            existencias y almacenes.
                        </p>

                    </div>


                    <!-- CRM -->

                    <div
                        class="rounded-2xl border border-white/10 bg-white/5 p-6 transition hover:border-purple-500"
                    >

                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-600 text-lg font-bold"
                        >
                            C
                        </div>

                        <h3 class="mt-6 text-xl font-semibold">
                            CRM
                        </h3>

                        <p class="mt-3 text-slate-400">
                            Gestión de clientes y
                            relaciones comerciales.
                        </p>

                    </div>

                </div>

            </div>

        </section>


        <!-- SEGURIDAD -->

        <section class="border-t border-white/10">

            <div class="mx-auto max-w-7xl px-6 py-20">

                <div class="grid gap-8 md:grid-cols-3">

                    <div>

                        <h3 class="text-lg font-semibold">
                            Autenticación centralizada
                        </h3>

                        <p class="mt-3 text-slate-400">
                            Un único sistema de autenticación
                            para todos los proyectos.
                        </p>

                    </div>


                    <div>

                        <h3 class="text-lg font-semibold">
                            OAuth2
                        </h3>

                        <p class="mt-3 text-slate-400">
                            Los proyectos clientes podrán
                            conectarse mediante OAuth2.
                        </p>

                    </div>


                    <div>

                        <h3 class="text-lg font-semibold">
                            Control de acceso
                        </h3>

                        <p class="mt-3 text-slate-400">
                            Los usuarios podrán acceder
                            solamente a las aplicaciones autorizadas.
                        </p>

                    </div>

                </div>

            </div>

        </section>

    </main>


    <!-- FOOTER -->

    <footer class="border-t border-white/10">

        <div class="mx-auto max-w-7xl px-6 py-8">

            <p class="text-sm text-slate-500">
                Central SSO &copy; {{ date('Y') }}
            </p>

        </div>

    </footer>

</div>

@endsection
