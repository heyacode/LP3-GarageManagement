<?php
namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AppointmentController extends Controller
{
    public function index(): View
    {
        $appointments = Appointment::where('id', Auth::id())->get();
        return view('client.appointment', compact('appointments'));
    }
    public function create()
    {
        return view('client.createapp');
    }

    public function store(Request $request)
    {
        $request->validate([
            'adate' => 'required|date',
            'atime' => 'required|date_format:H:i',
            'mark' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'photo.*' => 'nullable|image',
            'comment' => 'nullable|string',
        ]);

        $appointment = new Appointment();
        $appointment->user_id = Auth::id();
        $appointment->adate = $request->adate;
        $appointment->atime = $request->atime;
        $appointment->mark = $request->mark;
        $appointment->model = $request->model;

        if ($request->hasFile('photo')) {
            $photos = [];
            foreach ($request->file('photo') as $file) {
                $photos[] = $file->store('photos', 'public');
            }
            $appointment->photo = json_encode($photos); // Store as JSON array
        }

        $appointment->comment = $request->comment;
        $appointment->save();

        return redirect()->route('client.appointment')->with('success', 'Appointment created successfully.');
    }
}
