<?php

namespace App\Http\Controllers;

use App\Models\PklPlace;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        $pkl_places = PklPlace::all()->where('status', 'aktif');
        return view("index", compact('pkl_places'));
    }
}
