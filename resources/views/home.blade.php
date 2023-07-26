@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($bands as $band)
            <div class="col-md-4">
                <div class="card mb-4 border-0 shadow">
                    <img class="card-img-top" src="{{ asset('storage/'.$band->poster) }}" alt="Card image cap">
                    
                    <div class="card-body">
                        <h5 class="mb-0 card-title text-uppercase">
                            <a href="{{ route('band.show', $band) }}">{{ $band->name }}</a>
                        </h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
