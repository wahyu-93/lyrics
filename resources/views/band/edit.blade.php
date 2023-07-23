@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts.partials.menu')
        </div>
        <div class="col-md-9">
            <div class="card card-body mb-2">
                <h3 class="card-title">Update Band</h3>
                <hr>
                <form action="{{ route('band.update', $band) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="poster" class="form-label">Poster</label>
                        <br>
                        <img src="{{ asset('storage/'.$band->poster) }}" style="width: 350px; height: 300px; border-radius:5px" class="mb-2">
                        <input type="file" name="poster" id="poster" class="form-control @error('poster') is-invalid @enderror" accept="image/*">

                        @error('poster')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                   @include('band.partials.form', [
                       'submit' => 'Update'
                   ])
                </form>

            </div>
        </div>
    </div>
    
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#genre').val({{ json_encode($band->genres()->allRelatedIds()) }}).trigger('change');
        })
    </script>
@endsection
