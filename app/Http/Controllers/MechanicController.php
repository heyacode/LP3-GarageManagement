<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function profilMechanic()
    {
        $user = Auth::user();
        return view('mechanic.profil', compact('user'));
    }
    public function updateProfilMechanic(Request $request)
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
        return redirect()->route('profil')->with('success', 'mechanic mis à jour avec succès.');
    }
}
