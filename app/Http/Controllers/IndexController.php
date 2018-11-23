<?php

namespace App\Http\Controllers;

use Connection;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $response = Connection::getAirQualityData()->getBody();

        $data = parseXmlToCollection($response);

        dd($data);
    }
}
