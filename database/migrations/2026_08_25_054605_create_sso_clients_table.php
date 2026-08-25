<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sso_clients', function (Blueprint $table) {
             $table->id();

            // Nombre que verá el administrador
            $table->string('name');

            // Identificador público del cliente
            $table->string('client_id')->unique();

            // Se almacena hasheado
            $table->string('client_secret');

            // URL a la que SSO devolverá al usuario
            $table->string('redirect_uri');

            // Aplicación relacionada
            $table->foreignId('application_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // Cliente activo
            $table->boolean('active')->default(true);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sso_clients');
    }
};
