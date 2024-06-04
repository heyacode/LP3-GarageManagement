<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $role = auth()->user()->role;
        if ($role == 'admin') {
            return view('admin.astats');
        } elseif ($role == 'mechanic') {
            return view('dashboards.stats.mstats');
        } elseif ($role == 'client') {
            return view('dashboards.stats.cstats');
        }
        return redirect()->route('login');
    }

    public function admin()
    {
        return view('admin.astats');
    }


    public function mechanic()
    {
        return view('dashboards.stats.mstats');
    }

    public function client()
    {
        return view('dashboards.stats.cstats');
    }
}
