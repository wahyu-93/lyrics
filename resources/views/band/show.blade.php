@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('band.partials.block')

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
