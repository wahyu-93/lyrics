@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($bands as $band)
            <div class="col-md-4">
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
            </div> 
        @endforeach
    </div>
</div>
@endsection
