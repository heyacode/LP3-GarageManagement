<?php

// namespace App\Http\Controllers;

// use App\Models\User;
// use App\Models\Vehicle;
// use Illuminate\View\View;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\RedirectResponse;

// class ClientController extends Controller
// {
//     public function index()
//     {
//         $clients = User::where('role', 'client')->get();
//         return view('admin.client.index', compact('clients'));
//     }
//     public function show(Request $request)
//     {
//         $client_id = $request->input('client_id');
//         $client = User::find($client_id);

//         if (!$client) {
//             return response()->json(['error' => 'Client not found'], 404);
//         }
//         $vehicle = Vehicle::where('user_id', $client_id)->first();

//         return response()->json([
//             'html' => view('admin.client.details', compact('client', 'vehicle'))->render()
//         ]);
//     }

//     public function edit(User $client): View
//     {
//         return view('admin.client.edit', compact('client'));
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, User $client): RedirectResponse
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

//         $client->update($request->all());

//         return redirect()->route('clients.index')
//             ->with('success', 'client updated successfully');
//     }



//     public function delete()
//     {
//         $client_id = request('txtId');
//         $client = User::find($client_id);
//         try {
//             $client->delete();
//             return "ok";
//         } catch (Exception $e) {
//             return "error";
//         }
//     }



//     public function create()
//     {
//         return view('admin.client.create');
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
//             'role' => '', // Validation du rôle
//             'email' => 'required|string|email|max:255|unique:users',
//             'password' => 'required|string|min:6|confirmed',
//         ]);

//         $user = User::create([
//             'username' => $request->username,
//             'firstname' => $request->firstname,
//             'lastname' => $request->lastname,
//             'address' => $request->address,
//             'phone' => $request->phone,
//             'role' => 'client',
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//         ]);
//         return redirect()->route('admin.client.index')->with('success', 'User created successfully as a client.');
//     }
// }


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
