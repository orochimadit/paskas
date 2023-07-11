<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RegistrationController extends Controller
{
    public function index(){
        //get categories
          $registrations = Registration::when(request()->q, function($registrations) {
            $registrations = $registrations->where('name', 'like', '%'. request()->q . '%');
        })->latest()->paginate(5);
    
        //return inertia
        return Inertia::render('Apps/Registrations/Index', [
            'registrations' => $registrations,
        ]);
    }
}
