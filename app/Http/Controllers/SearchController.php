<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Genre;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function band()
    {
        $query = Request('query');
        $bands = Band::with('genres')->where('name', 'LIKE', "%{$query}%")->latest()->get();
        return view('home', compact('bands'));
    }

    public function genre(Genre $genre)
    {
        $bands = $genre->bands()->with('genres')->get();
        return view('home', compact('bands'));
    }

    public function bandAlphabet($alphabet)
    {
        $bands = Band::with('genres')->where('name', 'LIKE', "{$alphabet}%")->latest()->get();
        return view('home', compact('bands'));
    }
}
