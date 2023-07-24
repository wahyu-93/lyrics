<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $bands = Band::latest()->get();
        return view('album.create', compact('bands'));
    }

    public function store()
    {
    }
}
