<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Application::create([
            'name' => 'Ventas',
            'slug' => 'ventas',
            'description' => 'Sistema de gestión comercial.',
            'url' => 'http://ventas.local',
            'icon' => 'V',
            'color' => 'indigo',
            'active' => true,
        ]);

        Application::create([
            'name' => 'Inventario',
            'slug' => 'inventario',
            'description' => 'Administración de productos e inventario.',
            'url' => 'http://inventario.local',
            'icon' => 'I',
            'color' => 'purple',
            'active' => true,
        ]);

        Application::create([
            'name' => 'Reportes',
            'slug' => 'reportes',
            'description' => 'Centro de reportes y análisis.',
            'url' => 'http://reportes.local',
            'icon' => 'R',
            'color' => 'cyan',
            'active' => true,
        ]);
    }
}
