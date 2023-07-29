@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/search" method="GET">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Search</span>
            <input type="text" class="form-control" placeholder="Search Any Band . . ." aria-label="Username" aria-describedby="basic-addon1" name="query">
        </div>
    </form>

    <div class="mb-2 bg-white p-2">
        @foreach(range('A', 'Z') as $alphabet)
            <a href="{{ route('search.band.alphabet', $alphabet) }}" style="margin-right: 15px">
                {{ $alphabet }}
            </a> 
        @endforeach
    </div>

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
            <h3>There are no band</h3>
        @endforelse
    </div>
</div>
@endsection
