<?php

namespace App\Http\Controllers;

use Connection;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $response = Connection::getAirQualityData()->getBody();

        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $data = json_decode($json,TRUE);

        dd($data);
    }
}
