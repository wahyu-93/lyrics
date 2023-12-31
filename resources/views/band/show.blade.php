@extends('layouts.app')

@section('title', $band->name)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- @include('band.partials.block') --}}
            @component('band.partials.block')
                @slot('poster', $band->poster)
                @slot('body')
                    <h5 class="mb-1 card-title text-uppercase">
                        <a href="{{ route('band.show', $band) }}">{{ $band->name }}</a>
                    </h5>
                
                    @foreach ($band->genres as $genre)
                        <span class="badge bg-dark py-2 px-2">{{$genre->name}}</span>
                    @endforeach
                @endslot    
            @endcomponent

            {{-- album dan song --}}
            @foreach($albums as $album)
                <div class="bg-white shadow py-3 px-3 mb-2 rounded-lg">
                    <div class="mb-2">
                        {{ $album->name }}
                    </div>

                    <ul class="list-group">
                        @foreach($album->songs as $song)
                        <li class="list-group-item">
                                <a href="{{ route('song.show', [$band, $song]) }}" class="text-decoration-none text-dark">{{ $song->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div> 

    </div>
</div>
@endsection
