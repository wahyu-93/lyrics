@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts.partials.menu')
        </div>
        <div class="col-md-9">
            <div class="card card-body mb-2">
                <h3 class="card-title">Create new Album</h3>
                <hr>
                <form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('album.partials.form',[
                        'submit' => 'save',
                        'album' => new App\models\Album,
                        'type' => "btn-primary"
                    ])
                </form>

            </div>

            @if($albums->count())
                <div class="card card-body">
                    <h3 class="card-title">All Albums</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Band</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($albums as $album)
                                <tr>
                                    <td>{{ $album->name }}</td>
                                    <td>{{ $album->band->name }} </td>
                                    <td>
                                        @include('album.delete')
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
