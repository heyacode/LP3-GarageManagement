<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SparePart;
use Illuminate\Http\Request;

class SparePartController extends Controller
{
    public function index()
    {
        $spareparts = SparePart::all();
        return view('admin.sparepart', compact('spareparts'));
    }
    public function addSparepart(Request $request)
    {
        $request->validate([
            'partName' => 'required|string|max:255',
            'partReference' => 'required|string|max:255',
            'supplier' => 'required|string|max:255',
            'price' => 'required|numeric',

        ]);

        $sparepart = new SparePart;
        $sparepart->partName = $request->partName;
        $sparepart->partReference = $request->partReference;
        $sparepart->supplier = $request->supplier;
        $sparepart->price = $request->price;


        $sparepart->save();
        return redirect()->route('admin.sparepart')->with('success', 'sparepart created successfully.');
    }
    public function updateSparepart(Request $request)
    {
        $request->validate([
            'partName' => 'required|string|max:255',
            'partReference' => 'required|string|max:255',
            'supplier' => 'required|string|max:255',
            'price' => 'required|numeric',

        ]);

        $sparepart = SparePart::findOrFail($request->input('id'));
        $sparepart->update([
            'partName' => $request->partName,
            'partReference' => $request->partReference,
            'supplier' => $request->supplier,
            'price' => $request->price,
        ]);
        $sparepart->save();
        return redirect()->route('admin.sparepart')->with('success', 'sparepart mis à jour avec succès.');
    }
    public function deleteSparepart(Request $request)
    {
        $sparepartId = $request->input('sparepartId');
        SparePart::destroy($sparepartId);
        return redirect()->route('admin.sparepart')->with('success', 'sparepart supprimé avec succès.');
    }


    public function showSparepart($id)
    {
        $sparepart = SparePart::find($id);
        if (!$sparepart) {
            return response()->json(['error' => 'sparepart not found'], 404);
        }
        return response()->json($sparepart);
    }
}
