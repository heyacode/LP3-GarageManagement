<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthController;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $clients = User::where('role', 'client')->get();
        return view('admin.client.index', compact('clients'));
    }

    // Dans votre UserController ou un autre contrôleur approprié


    public function clientlist()
    {
        // Assurez-vous de filtrer uniquement les utilisateurs ayant le rôle 'client'
        $clients = User::where('role', 'client')->get();
        return view('admin.client.index', compact('clients'));
    }
    public function mechaniclist()
    {
        // Assurez-vous de filtrer uniquement les utilisateurs ayant le rôle 'client'
        $mechanics = User::where('role', 'mechanic')->get();
        return view('admin.mechaniclist', compact('mechanics'));
    }
    // public function destroy($id)
    // {
    //     $client = User::findOrFail($id);
    //     if ($client->role === 'client') {
    //         $client->delete();
    //         return response()->json(['success' => 'Client supprimé avec succès']);
    //     }
    //     return response()->json(['error' => 'Client non trouvé ou ne peut être supprimé'], 404);
    // }




    public function __construct()
    {
        $this->middleware('auth');
    }

}
