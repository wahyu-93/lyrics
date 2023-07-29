<?php

namespace App\Http\Controllers;

use App\Models\Album;
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
        $albums = Album::get();
        return view('album.create', compact('bands', 'albums'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name'  => 'required',
            'band'  => 'required'
        ]);

        $band = Band::find($request->band);
        $band->albums()->create($data);

        session()->flash('success', 'Album Has Been Create');
        return back();
    }

    public function update(Request $request, Album $album)
    {
        $this->validate($request, [
            'name' => 'required',
            'band' => 'required'
        ]);

        $album->update([
            'name'  => $request->name,
            'band_id'   => $request->band
        ]);

        session()->flash('success', 'Album Has Been Update');
        return back();
    }

    public function getAllAlbumById($id)
    {
        $band = Band::findOrFail($id);
        return $band->albums;
    }
}
