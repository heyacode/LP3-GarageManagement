<?php



// namespace App\Http\Controllers;

// use App\Models\Vehicle;
// use Illuminate\View\View;
// use Illuminate\Http\Request;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Support\Facades\Storage;

// class VehicleController extends Controller
// {
//     public function index()
//     {
//         $vehicles = Vehicle::all();
//         return view('admin.vehicle.index', compact('vehicles'));
//     }
//     public function show(Request $request)
//     {
//         $vehicle_id = $request->input('vehicle_id');
//         $vehicle = Vehicle::find($vehicle_id);

//         if (!$vehicle) {
//             return response()->json(['error' => 'vehicle not found'], 404);
//         }

//         return response()->json([
//             'html' => view('admin.vehicle.details', compact('vehicle'))->render()
//         ]);
//     }

//     // public function edit(Vehicle $vehicle): View
//     // {
//     //     return view('admin.vehicle.edit', compact('vehicle'));
//     // }

//     // /**
//     //  * Update the specified resource in storage.
//     //  */
//     // public function update(Request $request, Vehicle $vehicle): RedirectResponse
//     // {
//     //     $request->validate([
//     //         'mark' => 'required',
//     //         'model' => 'required',
//     //         'fuelType' => 'required',
//     //         'registration' => 'required',
//     //         'photo' => 'required|image',        ]);

//     //     $vehicle->update($request->all());

//     //     return redirect()->route('vehicle.index')
//     //         ->with('success', 'vehicle updated successfully');
//     // }
//     public function edit(Vehicle $vehicle): View
//     {
//         return view('admin.vehicle.edit', compact('vehicle'));
//     }

//     public function update(Request $request, Vehicle $vehicle): RedirectResponse
//     {
//         $request->validate([
//             'mark' => 'required|string|max:255',
//             'model' => 'required|string|max:255',
//             'fuelType' => 'required|string|in:Diesel,Gasoline',
//             'registration' => 'required|string|max:255',
//             'photo' => 'nullable|image',
//         ]);

//         $vehicle->mark = $request->mark;
//         $vehicle->model = $request->model;
//         $vehicle->fuelType = $request->fuelType;
//         $vehicle->registration = $request->registration;

//         if ($request->hasFile('photo')) {
//             // Delete old photo if exists
//             if ($vehicle->photo && Storage::exists('public/'.$vehicle->photo)) {
//                 Storage::delete('public/'.$vehicle->photo);
//             }
//             // Store new photo
//             $vehicle->photo = $request->file('photo')->store('photos', 'public');
//         }

//         $vehicle->save();
//         return redirect()->route('admin.vehicle.index')
//         ->with('success', 'Vehicle updated successfully');
//     }


//     public function delete()
//     {
//         $vehicle_id = request('txtId');
//         $vehicle = Vehicle::find($vehicle_id);
//         try {
//             $vehicle->delete();
//             return "ok";
//         } catch (Exception $e) {
//             return "error";
//         }
//     }



//     public function create()
//     {
//         return view('admin.vehicle.create');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'mark' => 'required|string|max:255',
//             'model' => 'required|string|max:255',
//             'fuelType' => 'required|string|in Diesel,Gasoline',
//             'registration' => 'required|string|max:255',
//             'photo' => 'required|image',
//         ]);

//         $vehicle = Vehicle::create([
//             'mark' => $request->mark,
//             'model' => $request->model,
//             'fuelType' => $request->fuelType,
//             'registration' => $request->registration,
//             'photo' => $request->file('photo')->store('photos', 'public'),
//         ]);
//         return redirect()->route('admin.vehicle.index')->with('success', 'vehicle created successfully ');
//     }
// }


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
