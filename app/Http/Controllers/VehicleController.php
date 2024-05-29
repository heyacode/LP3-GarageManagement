<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function vehiclelist()
    {
        // Assurez-vous de filtrer uniquement les utilisateurs ayant le rôle 'client'
        $vehicles = Vehicle::all();
        return view('admin.vehiclelist', compact('vehicles'));
    }
}
