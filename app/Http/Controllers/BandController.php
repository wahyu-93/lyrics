<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        $bands = Band::latest()->paginate(12);
        return view('band.index', compact('bands'));
    }

    public function create()
    {
        // $genres = Genre::latest()->get();
        $bands = Band::latest()->paginate(12);
        return view('band.create', compact('bands'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'poster' => 'required',
            'genre' => 'required'
        ]);

        $image = $request->file('poster')->store('band_poster');

        $band = Band::create([
            'name'  => $request->name,
            'poster' => $image
        ]);

        $band->genres()->sync($request->genre, false);
        return back();
    }

    public function show(Band $band)
    {
        $albums = $band->albums()->with('songs')->latest()->get();
        return view('band.show', compact('band', 'albums'));
    }

    public function edit(Band $band)
    {
        // $genres = Genre::latest()->get();
        return view('band.edit', compact('band'));
    }

    public function update(Band $band, Request $request)
    {
        if ($request->file('poster')) {
            Storage::delete($band->poster);
            $poster = $request->file('poster')->store('band_poster');
        } else {
            $poster = $band->poster;
        };

        $band->update([
            'name'  => $request->name,
            'poster' => $poster
        ]);

        if ($request->genre) {
            $band->genres()->sync($request->genre);
        } else {
            $band->genres()->sync([]);
        };

        session()->flash('success', 'Your Band Has Been Update');
        return redirect()->route('band.index');
    }
}
