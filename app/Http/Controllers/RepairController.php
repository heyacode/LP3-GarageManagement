<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepairController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            $repairs = Repair::all();
            return view('admin.repair', compact('repairs'));
        } else if($user->role == 'mechanic'){
            $repairs = Repair::all();
            return view('mechanic.repair', compact('repairs'));

        }
    }
    public function show(Request $request)
    {
        $repair_id = $request->input('repair_id');
        $repair = Repair::find($repair_id);

        if (!$repair) {
            return response()->json(['error' => 'repair not found'], 404);
        }

        return response()->json([
            'html' => view('admin.repair.details', compact('repair'))->render()
        ]);
    }
}
