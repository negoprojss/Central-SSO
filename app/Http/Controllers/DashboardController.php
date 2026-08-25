<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $applications = Application::query()
            ->where('active', true)
            ->orderBy('name')
            ->get();

         return view('dashboard', [
            'applications' => $applications,
        ]);
    }
}
