@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($bands as $band)
            <div class="col-md-4">
                @include('band.partials.block')
            </div> 
        @endforeach

    </div>
</div>
@endsection
