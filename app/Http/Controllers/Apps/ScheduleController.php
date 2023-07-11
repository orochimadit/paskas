<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Inertia\Inertia;

class ScheduleController extends Controller
{
    
    public function index(){
    //get categories
      $schedules = Schedule::when(request()->q, function($schedules) {
        $schedules = $schedules->where('name', 'like', '%'. request()->q . '%');
    })->latest()->paginate(5);

    //return inertia
    return Inertia::render('Apps/Schedules/Index', [
        'schedules' => $schedules,
    ]);
    
    }
}
