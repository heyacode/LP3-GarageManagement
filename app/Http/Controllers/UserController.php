<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function clientlist()
    {
        // Assurez-vous de filtrer uniquement les utilisateurs ayant le rôle 'client'
        $clients = User::where('role', 'client')->get();
        return view('admin.clientlist', compact('clients'));
    }
    public function mechaniclist()
    {
        // Assurez-vous de filtrer uniquement les utilisateurs ayant le rôle 'client'
        $mechanics = User::where('role', 'mechanic')->get();
        return view('admin.mechaniclist', compact('mechanics'));
    }

}
