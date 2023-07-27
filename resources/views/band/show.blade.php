@extends('layouts.app')

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
                <div class="card border-0 shadow mb-2">
                    <div class="card-body">
                        <div>
                            {{ $album->name }}
                        </div>

                        <ul class="list-group">
                            @foreach($album->songs as $song)
                               <li class="list-group-item">
                                    <a href="" class="text-decoration-none text-dark">{{ $song->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div> 

    </div>
</div>
@endsection
