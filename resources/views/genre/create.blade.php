@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts.partials.menu')
        </div>
        <div class="col-md-9">
            <div class="card card-body mb-2">
                <h3 class="card-title">Create new Genre</h3>
                <form action="{{ route('genre.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" placeholder="Input Genre" class="form-control @error('name') is-invalid @enderror mb-1">
                        
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>

            @if($genres->count())
                <div class="card card-body">
                    <h3 class="card-title">All Genres</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($genres as $genre)
                                <tr>
                                    <td>{{ $genre->name }}</td>
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
