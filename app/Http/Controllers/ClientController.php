<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = User::where('role', 'client')->get();
        return view('admin.client', compact('clients'));
    }
    public function addClient(Request $request)
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

        $client = new User;
        $client->password = Hash::make($request->password);
        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->username = $request->username;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->role = 'client';

        $client->save();
        return redirect()->route('admin.client')->with('success', 'client created successfully.');
    }
    public function updateClient(Request $request)
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

        $client = User::findOrFail($request->input('id'));
        $client->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);
        $client->role = 'client';

        $client->save();
        return redirect()->route('admin.client')->with('success', 'client mis à jour avec succès.');
    }
    public function deleteClient(Request $request)
    {
        $clientId = $request->input('clientId');
        User::destroy($clientId);
        return redirect()->route('admin.client')->with('success', 'client supprimé avec succès.');
    }


    public function showClient($id)
    {
        $client = User::find($id);
        if (!$client) {
            return response()->json(['error' => 'client not found'], 404);
        }
        $vehicle = Vehicle::where('user_id', $client)->first();

        return response()->json([
            'html' => view('admin.client', compact('client', 'vehicle'))->render()
        ]);
    }
}
