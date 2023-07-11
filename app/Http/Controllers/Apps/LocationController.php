<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function provinces()
    {
        return response()->json(Province::orderBy('name', 'ASC')->get());
    }

    public function regencies(Province $province){
        $regencies = Regency::where('province_id',$province->id)->get();
        return response()->json($regencies);
    }

    public function districts($regency){
        $districts = District::where('regency_id',$regency)->get();
        return response()->json($districts);
    }

    public function villages($district){
        $villages = Village::where('district_id',$district)->get();
        return response()->json($villages);
    }
}
