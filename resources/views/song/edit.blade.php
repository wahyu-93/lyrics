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
                <form action="{{ route('song.update', $song) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('song.partials.form')                    

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
    </div>
    
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            const album_id = $('#album_id').val();
            const album_name = $('#album_name').val();
            const band_id = $('._band').val();
            let ket = ''

            $.get('/album/' + band_id, function(data){
                $.each(data, function(key, value){
                    if(value.id != album_id){
                        ket = ''
                    }
                    else {
                        ket = 'selected'
                    }
                    $('#select-album').append('<option '+ket+' value='+ value.id +' >'+value.name+'</option>')
                })
            })     
        
            $('._band').on('change', function(){
                $('#select-album').html('')
                $.get('/album/' + this.value, function(data){
                    $.each(data, function(key, value){
                        $('#select-album').append('<option value='+ value.id +'>'+value.name+'</option>')
                    })
                })     
            })
        })
    </script>
@endsection
