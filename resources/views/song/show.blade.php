@extends('layouts.app')

@section('title', "{$band->name} - {$song->title}")

@section('content')
<div class="container">
    <div class="row justify-center">
        <div class="col-md-10">
            @component('band.partials.block')
                @slot('poster', $band->poster)
                @slot('body')
                    <div class="text-center">
                        <h1 class="mb-1 card-title text-uppercase">
                            <a href="{{ route('band.show', $band) }}">{{ $band->name }}</a>
                        </h5>

                        <h2>{{ $song->title }} - {{ $song->album->name  }}</h2>
                        
                        @if(Auth::check())
                            <a href="{{ route('song.edit', $song) }}" class="btn btn-light btn-sm">Edit</a>
                        @endif
                        
                        <hr>
                        {!! nl2br($song->lyrics) !!}
                    </div>
                @endslot    
            @endcomponent
        </div> 
    </div>
</div>
@endsection
