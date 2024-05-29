<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function destroy(User $client)
    {
        $client->delete();
        return redirect()->route('admin.clientlist')->with('success', 'Produit supprimé avec succès.');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('admin.createuser');
    }

    // Stocker un nouveau client
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'role' => 'required|string|in:client,mechanic', // Validation du rôle
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'phone' => $request->phone,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user->role === 'client') {
            return redirect()->route('admin.clientlist')->with('success', 'User created successfully as a client.');
        } elseif ($user->role === 'mechanic') {
            return redirect()->route('admin.mechaniclist')->with('success', 'User created successfully as a mechanic.');
        }    }

}
