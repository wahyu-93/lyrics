@extends('layouts.app')

@section('content')
<div class="bg-blue-dark py-20 mb-3 -mt-8">
    <div class="container">
        <div class="text-white text-5xl">SING WITH ME !</div>
        
        <form action="/search" method="GET">
            <input type="text" class="w-full rounded-full py-2 px-3 border-0 outline-none" placeholder="Search Any Band . . ." aria-label="Username" aria-describedby="basic-addon1" name="query">
        </form>
    </div>
</div>

<div class="container">
    <div class="row">    
        @forelse ($bands as $band)
            <div class="col-md-4">
                <div class="card mb-4 border-0 shadow">
                    <img class="card-img-top" src="{{ asset('storage/'.$band->poster) }}" alt="Card image cap">
                    
                    <div class="card-body">
                        <h5 class="mb-0 card-title text-uppercase">
                            <a href="{{ route('band.show', $band) }}">{{ $band->name }}</a>
                        </h5>

                        @foreach ($band->genres as $genre)
                            <a href="{{ route('search.genre', $genre) }}">
                                <span class="badge bg-secondary py-1 px-1">{{$genre->name}}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @empty
            <div class="mt-3 text-2xl">There are no band . . . </div>
        @endforelse
    </div>
</div>
@endsection
