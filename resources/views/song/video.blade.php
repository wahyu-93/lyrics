<!-- Button trigger modal -->
<button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#{{ $song->id }}">
    Show Video
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="{{ $song->id }}" tabindex="-1" aria-labelledby="{{ $song->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="{{ $song->id }}Label">{{ $song->title }} - {{ $song->album->name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @if($song->embed)
            <iframe width="460" height="360" src="{{ $song->embed }}" title="One Piece OP 1 - We Are! Lyrics" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          @else
            <p>Video Not Found</p>
          @endif
          </div>
      </div>
    </div>
  </div>