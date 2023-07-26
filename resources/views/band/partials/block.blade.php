<div class="card mb-2 border-0 shadow">
    <img class="card-img-top" src="{{ asset('storage/'.$band->poster) }}" alt="Card image cap">
    
    <div class="card-body">
        <h5 class="mb-1 card-title text-uppercase">
            <a href="{{ route('band.show', $band) }}">{{ $band->name }}</a>
        </h5>
       
        @foreach ($band->genres as $genre)
             <span class="badge bg-dark py-2 px-2">{{$genre->name}}</span>
        @endforeach
    </div>
</div>