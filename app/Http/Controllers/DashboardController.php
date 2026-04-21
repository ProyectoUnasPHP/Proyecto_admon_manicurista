<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'totalServices' => Service::count(),
            'totalUsers' => User::count(),
            'totalAppointments' => 0, // Placeholder si no existe modelo Appointment aún
        ];

        return view('dashboard', $stats);
    }
}
