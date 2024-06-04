<?php

// namespace App\Http\Controllers;

// use App\Models\User;
// use Illuminate\View\View;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\RedirectResponse;

// class MechanicController extends Controller
// {
//     public function index()
//     {
//         $mechanics = User::where('role', 'mechanic')->get();
//         return view('admin.mechanic.index', compact('mechanics'));
//     }
//     public function show(Request $request)
//     {
//         $mechanic_id = $request->input('mechanic_id');
//         $mechanic = User::find($mechanic_id);

//         if (!$mechanic) {
//             return response()->json(['error' => 'Mechanic not found'], 404);
//         }

//         return response()->json([
//             'html' => view('admin.mechanic.details', compact('mechanic'))->render()
//         ]);
//     }

//     public function edit(User $mechanic): View
//     {
//         return view('admin.mechanic.edit', compact('mechanic'));
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, User $mechanic): RedirectResponse
//     {
//         $request->validate([
//             'username' => 'required',
//             'firstname' => 'required',
//             'lastname' => 'required',
//             'address' => 'required',
//             'phone' => 'required',
//             'email' => 'required',
//             'password' => 'required',
//         ]);

//         $mechanic->update($request->all());

//         return redirect()->route('admin.mechanic.index')
//             ->with('success', 'client updated successfully');
//     }



//     public function delete()
//     {
//         $mechanic_id = request('txtId');
//         $mechanic = User::find($mechanic_id);
//         try {
//             $mechanic->delete();
//             return "ok";
//         } catch (Exception $e) {
//             return "error";
//         }
//     }


//     public function create()
//     {
//         return view('admin.mechanic.create');
//     }

//     // Stocker un nouveau client
//     public function store(Request $request)
//     {
//         $request->validate([
//             'username' => 'required|string|max:255',
//             'firstname' => 'required|string|max:255',
//             'lastname' => 'required|string|max:255',
//             'address' => 'required|string|max:255',
//             'phone' => 'required|string|max:255',
//             'role' => '',
//             'email' => 'required|string|email|max:255|unique:users',
//             'password' => 'required|string|min:6|confirmed',
//         ]);

//         $user = User::create([
//             'username' => $request->username,
//             'firstname' => $request->firstname,
//             'lastname' => $request->lastname,
//             'address' => $request->address,
//             'phone' => $request->phone,
//             'role' => 'mechanic',
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//         ]);
//         return redirect()->route('admin.mechanic.index')->with('success', 'User created successfully as a mechanic.');
//     }
// }


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function index()
    {
        $mechanics = User::where('role', 'mechanic')->get();
        return view('admin.mechanic', compact('mechanics'));
    }
    public function addMechanic(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'role' => '',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',

        ]);

        $mechanic = new User;
        $mechanic->password = Hash::make($request->password);
        $mechanic->firstname = $request->firstname;
        $mechanic->lastname = $request->lastname;
        $mechanic->username = $request->username;
        $mechanic->email = $request->email;
        $mechanic->phone = $request->phone;
        $mechanic->address = $request->address;
        $mechanic->role = 'mechanic';

        $mechanic->save();
        return redirect()->route('admin.mechanic')->with('success', 'Mecanicien created successfully.');
    }
    public function updateMechanic(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required',

        ]);

        $mechanic = User::findOrFail($request->input('id'));
        $mechanic->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);
        $mechanic->role = 'mechanic';

        $mechanic->save();
        return redirect()->route('admin.mechanic')->with('success', 'Mécanicien mis à jour avec succès.');
    }
    public function deleteMechanic(Request $request)
    {
        $mechanicId = $request->input('mechanicId');
        User::destroy($mechanicId);
        return redirect()->route('admin.mechanic')->with('success', 'Mécanicien supprimé avec succès.');
    }


    public function showMechanic($id)
    {
        $mechanic = User::find($id);
        if (!$mechanic) {
            return response()->json(['error' => 'Mecanicien not found'], 404);
        }
        return response()->json($mechanic);
    }
}
