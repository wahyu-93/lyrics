<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $bands = Band::get();
        $albums = Album::get();
        return view('song.create', compact('bands', 'albums'));
    }
}
