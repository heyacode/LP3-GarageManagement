<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function index()
    {
        $repairs = Repair::all();
        return view('admin.repair', compact('repairs'));
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
