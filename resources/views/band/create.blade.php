@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts.partials.menu')
        </div>
        <div class="col-md-9">
            <div class="card card-body mb-2">
                <h3 class="card-title">Create new Band</h3>
                <hr>
                <form action="{{ route('band.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="poster" class="form-label">Poster</label>
                        <input type="file" name="poster" id="poster" class="form-control @error('poster') is-invalid @enderror" accept="image/*">

                        @error('poster')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name Band</label>
                        <input type="text" name="name" id="name" placeholder="Name Band" class="form-control @error('name') is-invalid @enderror mb-1">
                        
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

            @if($bands->count())
            <div class="card card-body">
                <h3 class="card-title">All Bands</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($bands as $band)
                            <tr>
                                <td>{{ $band->name }}</td>
                                <td>
                                    <a href="{{ route('band.edit', $band) }}" class="btn btn-success btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
             @endif
        </div>
    </div>
    
</div>
@endsection
