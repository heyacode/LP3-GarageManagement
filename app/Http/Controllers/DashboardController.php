<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;
        if ($role == 'admin') {
            return redirect()->route('admin.admin');
        } elseif ($role == 'mechanic') {
            return redirect()->route('mechanic.mechanic');
        } elseif ($role == 'client') {
            return redirect()->route('client.client');
        }
        return redirect()->route('home'); // Ou autre route par défaut
    }

    public function admin()
    {
        return view('admin.admin');
    }

    public function mechanic()
    {
        return view('mechanic.mechanic');
    }

    public function client()
    {
        return view('client.client');
    }
}
