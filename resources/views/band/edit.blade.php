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

                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name Band</label>
                        <input type="text" name="name" id="name" placeholder="Name Band" class="form-control @error('name') is-invalid @enderror mb-1" value="{{ $band->name ?? old('name') }}">
                        
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror   
                    </div>

                    <div class="form-group mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <select name="genre[]" id="genre" class="form-control @error('genre') is-invalid @enderror" multiple>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                            @endforeach
                        </select>

                        @error('genre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

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
            $('#genre').val({{ json_encode($band->genres()->allRelatedIds()) }}).trigger('change');
        })
    </script>
@endsection
