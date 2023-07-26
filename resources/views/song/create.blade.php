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
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">

                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="poster" class="form-label">Band</label>
                        <select name="band" id="select-band" class="form-control @error('band') is-invalid @enderror">
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
                        <select name="album" id="select-album" class="form-control @error('album') is-invalid @enderror">
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
                        <label for="lyrics">Lyric</label>
                        <textarea name="lyrics" id="lyrics" rows="15" class="form-control @error('lyrics') is-invalid @enderror"></textarea>

                        @error('lyrics')
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
