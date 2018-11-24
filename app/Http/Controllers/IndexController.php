<?php

namespace App\Http\Controllers;

use App\Models\AirQualityRecording;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $data = AirQualityRecording::get();

        return view('pages.index.index', compact('data'));
    }
}
