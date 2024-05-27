<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;
        if ($role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role == 'mecanicien') {
            return redirect()->route('mecanicien.dashboard');
        } elseif ($role == 'client') {
            return redirect()->route('client.dashboard');
        }
        return redirect()->route('home'); // Ou autre route par défaut
    }

    public function admin()
    {
        return view('dashboards.admin');
    }

    public function mecanicien()
    {
        return view('dashboards.mechanic');
    }

    public function client()
    {
        return view('dashboards.client');
    }
}
