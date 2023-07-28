<div class="form-group mb-3">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $song->title ?? old('title') }}">

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
    <textarea name="lyrics" id="lyrics" rows="15" class="form-control @error('lyrics') is-invalid @enderror">{{ $song->lyrics ?? old('lyrics') }}</textarea>

    @error('lyrics')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>