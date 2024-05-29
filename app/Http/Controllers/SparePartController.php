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
    public function create()
    {
        return view('admin.createsparepart');
    }

    public function store(Request $request)
    {
        $request->validate([
            'partName' => 'required|string|max:255',
            'partReference' => 'required|string|max:255',
            'supplier' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        Sparepart::create($request->all());

        return redirect()->route('admin.sparepartslist')->with('success', 'Spare part added successfully.');
    }

}
