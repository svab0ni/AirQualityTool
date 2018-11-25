<?php

namespace App\Http\Controllers;

use App\Models\AirQualityRecording;
use App\Models\HealthHazardLevel;
use App\Models\MonthlyAverageRecording;
use App\Models\WeeklyAverageRecording;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $dailyData = AirQualityRecording::orderBy('taken_at','desc')->take(8)->get()->reverse();
        $monthlyData = MonthlyAverageRecording::orderBy('taken_at','desc')->take(8)->get()->reverse();
        $weeklyData = WeeklyAverageRecording::orderBy('taken_at','desc')->take(8)->get()->reverse();
        //$data = HealthHazardLevel::get('name')->take(0)->get()->reverse();
        
        return view('pages.index.index', ['data8 '=> $dailyData,'d30' => $monthlyData, 'week8' => $weeklyData]);

        
    }
}
