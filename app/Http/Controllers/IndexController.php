<?php

namespace App\Http\Controllers;

use App\Models\AirQualityRecording;
use App\Models\HealthHazardLevel;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $data8 = AirQualityRecording::orderBy('taken_at','desc')->take(8)->get()->reverse();
        $data30 = AirQualityRecording::orderBy('taken_at','desc')->take(30*24)->get()->reverse();
        //$data = HealthHazardLevel::get('name')->take(0)->get()->reverse();

        return view('pages.index.index', ['data8'=>$data8,'d30'=>$data30, /*'data'=>$d*/]);

        
    }
}
