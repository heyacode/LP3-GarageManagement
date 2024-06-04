<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('admin.vehicle', compact('vehicles'));
    }
    public function addVehicle(Request $request)
    {
        $request->validate([
            'mark' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'fuelType' => 'required|string|in Diesel,Gasoline',
            'registration' => 'required|string|max:255',
            'photo' => 'required|image',

        ]);

        $vehicle = new Vehicle;
        $vehicle->mark = $request->mark;
        $vehicle->model = $request->model;
        $vehicle->fuelType = $request->fuelType;
        $vehicle->registration = $request->registration;
        $vehicle->photo = $request->file('photo')->store('photos', 'public');

        $vehicle->save();
        return redirect()->route('admin.vehicle')->with('success', 'vehicle created successfully.');
    }
    public function updateVehicle(Request $request)
    {
        $request->validate([
            'mark' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'fuelType' => 'required|string|in:Diesel,Gasoline',
            'registration' => 'required|string|max:255',
            'photo' => 'nullable|image',
        ]);

        $vehicle = Vehicle::findOrFail($request->input('id'));

        $vehicle->update([
            'mark' => $request->mark,
            'model' => $request->model,
            'fuelType' => $request->fuelType,
            'registration' => $request->registration,
        ]);

        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($vehicle->photo && Storage::exists('public/' . $vehicle->photo)) {
                Storage::delete('public/' . $vehicle->photo);
            }
            // Stocker la nouvelle photo
            $vehicle->photo = $request->file('photo')->store('photos', 'public');
            $vehicle->save();
            return redirect()->route('admin.vehicle')->with('success', 'vehicle mis à jour avec succès.');
        }
    }

    public function deleteVehicle(Request $request)
    {
        $vehicleId = $request->input('vehicleId');
        Vehicle::destroy($vehicleId);
        return redirect()->route('admin.vehicle')->with('success', 'vehicle supprimé avec succès.');
    }


    public function showVehicle($id)
    {
        $vehicle = Vehicle::find($id);
        if (!$vehicle) {
            return response()->json(['error' => 'vehicle not found'], 404);
        }
        return response()->json($vehicle);
    }
}
