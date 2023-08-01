<div class="form-group mb-3 ">
    <label for="name">Name Album</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $album->name }}" placeholder="Album (tahun)">

    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="band">Band</label>
    <select name="band" id="band" class="form-control @error('band') is-invalid @enderror">
        <option disabled selected>Pilih Band</option>
        @foreach ($bands as $band)
            <option {{ $band->id === $album->band_id ? "selected" : "" }} value="{{ $band->id }}">{{ $band->name }}</option>
        @endforeach
    </select>
    @error('band')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<button type="submit" class="btn {{ $type }}">{{ $submit }}</button>