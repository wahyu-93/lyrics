<div class="form-group mb-3">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $song->title ?? old('title') }}">

    @error('title')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="poster" class="form-label">Band</label>
    <select name="band" id="select-band" class="form-control _band @error('band') is-invalid @enderror">
        <option disabled selected>Pilih Band</option>
        @foreach($bands as $band)
            <option {{ $band->id == $song->band_id ? 'selected' : ''}} value="{{ $band->id }}">{{ $band->name }}</option>
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
            {{-- <option {{ $album->id == $song->album_id ? 'selected' : ''}} value="{{ $album->id }}">{{ $album->name }}</option> --}}
        @endforeach
    </select>

    @error('album')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="embed">Embed Youtube Lyrics</label>
    <input type="text" name="embed" id="embed" class="form-control" value="{{ $song->embed ?? old('embed') }}" placeholder="www.youtube.com/embed">
</div>

<div class="form-group mb-3">
    <label for="lyrics">Lyric</label>
    <textarea name="lyrics" id="lyrics" rows="15" class="form-control @error('lyrics') is-invalid @enderror">{{ $song->lyrics ?? old('lyrics') }}</textarea>

    @error('lyrics')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>