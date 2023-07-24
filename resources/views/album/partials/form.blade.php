<div class="form-group mb-3 ">
    <label for="name">Name Album</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $album->name }}" placeholder="Album (tahun)">
</div>

<div class="form-group mb-3">
    <label for="band">Band</label>
    <select name="band" id="band" class="form-control">
        <option disabled selected>Pilih Band</option>
        @foreach ($bands as $band)
            <option {{ $band->id === $album->band_id ? "selected" : "" }} value="{{ $band->id }}">{{ $band->name }}</option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn {{ $type }}">{{ $submit }}</button>