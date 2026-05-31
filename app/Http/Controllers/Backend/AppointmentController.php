<?php

namespace App\Http\Controllers\Backend;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::latest()->paginate(5);
        return view('backend.appointments.index',compact('appointments'));
    }

    public function view($id)
    {
        $appointment = Appointment::with('service')->findOrFail($id);
        return view('backend.appointments.view', compact('appointment'));
    }
}
