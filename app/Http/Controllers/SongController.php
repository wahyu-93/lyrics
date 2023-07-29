<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SongController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');;
    }

    public function create()
    {
        return view('song.create');
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

    public function show(Band $band, Song $song)
    {
        return view('song.show', compact('band', 'song'));
    }

    public function edit(Song $song)
    {
        return view('song.edit', compact('song'));
    }

    public function update(Request $request, Song $song)
    {
        $this->validate($request, [
            'title' => 'required',
            'band' => 'required',
            'album' => 'required',
            'lyrics' => 'required'
        ]);

        $song->update([
            'title' => $request->title,
            'album_id'  => $request->album,
            'lyrics' => $request->lyrics,
            'slug'  => Str::slug($request->title) . '-' .  Str::random(6)
        ]);

        session()->flash('success', 'Your Songs Has Been Update');
        return redirect()->route('dashboard');
    }
}
