<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Appointment,Contact};

class HomeController extends Controller
{
    public function index()
    {
         $booking   = Appointment::count();    
         $inquiries = Contact::count();    
         return view('backend.index',compact('booking','inquiries'));
    }
}
