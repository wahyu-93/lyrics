<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $genres = Genre::latest()->get();
        return view('genre.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $attribute = $this->validate($request, [
            'name'  => 'required|min:2',
        ]);

        Genre::create($attribute);

        session()->flash('success', 'Your Band Has Been Create');
        return back();
    }
}
