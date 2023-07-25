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

                    <div class="form-group mb-3">
                        <label for="poster" class="form-label">Band</label>
                        <select name="band" id="band" class="form-control @error('band') is-invalid @enderror">
                            <option disabled selected>Pilih Band</option>
                            @foreach($bands as $band)
                                <option value="{{ $band->id }}">{{ $band->name }}</option>
                            @endforeach
                        </select>

                        @error('band')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="album">Album</label>
                        <select name="album" id="album" class="form-control @error('album') is-invalid @enderror">
                            <option disabled selected>Pilih Album</option>
                            @foreach($albums as $album)
                                <option value="{{ $album->id }}">{{ $album->name }}</option>
                            @endforeach
                        </select>

                        @error('album')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="lyric">Lyric</label>
                        <textarea name="lyric" id="lyric" rows="20" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
        </div>
    </div>
    
</div>
@endsection
