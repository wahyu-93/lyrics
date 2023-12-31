@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts.partials.menu')
        </div>
        <div class="col-md-9">
            <div class="card card-body mb-2">
                <h3 class="card-title">Create new Song</h3>
                <hr>
                <form action="{{ route('song.store') }}" method="POST">
                    @csrf
                    @include('song.partials.form', [
                        'song' => new App\Models\Song
                    ])                    

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
        </div>
    </div>
    
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('._band').on('change', function(){
                $('#select-album').html('')
                $.get('/album/' + this.value, function(data){
                    $('#select-album').append('<option selected disabled>Pilih Album</option>')
                    $.each(data, function(key, value){
                        $('#select-album').append('<option value='+ value.id +'>'+value.name+'</option>')
                    })
                })     
            })
        })
    </script>
@endsection
