<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $bands = Band::with('genres')->latest()->get();
        return view('home', compact('bands'));
    }
}
