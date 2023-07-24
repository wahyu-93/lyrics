<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#{{ $album->slug }}">
    Edit
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="{{ $album->slug }}" tabindex="-1" aria-labelledby="{{ $album->slug }}Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="{{ $album->slug }}Label">{{ $album->name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @include('album.partials.form',[
              'submit'  => 'Update',
              'type' => 'btn-success'
          ])
        </div>
      </div>
    </div>
  </div>