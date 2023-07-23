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

                    @include('band.partials.form', [
                        'submit'    => 'Save'
                    ])
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
