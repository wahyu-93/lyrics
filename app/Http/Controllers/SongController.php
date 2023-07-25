<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'band' => 'required',
            'album' => 'required',
            'lyrics' => 'required'
        ]);

        $band = Band::find($request->band);
        $band->songs()->create([
            'title' => $request->title,
            'album_id'  => $request->album,
            'lyrics' => $request->lyrics,
            'slug'  => Str::slug($request->title) . '-' .  Str::random(6)
        ]);

        session()->flash('success', 'Your Songs Has Been Save');
        return back();
    }
}
