<?php

namespace App\Http\Controllers;

use Connection;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('pages.index.index', compact('data'));
    }
}
