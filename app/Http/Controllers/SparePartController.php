<?php

namespace App\Http\Controllers;

use App\Models\SparePart;
use Illuminate\Http\Request;

class SparePartController extends Controller
{
    public function sparepartslist()
    {
        // Assurez-vous de filtrer uniquement les utilisateurs ayant le rôle 'client'
        $spareparts = SparePart::all();
        return view('admin.sparepartslist', compact('spareparts'));
    }
}
