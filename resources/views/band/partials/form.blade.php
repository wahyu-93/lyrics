<div class="form-group mb-3">
    <label for="name" class="form-label">Name Band</label>
    <input type="text" name="name" id="name" placeholder="Name Band" class="form-control @error('name') is-invalid @enderror mb-1" value="{{ $band->name ?? old('name') }}">
    
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror   
</div>

<div class="form-group mb-3">
    <label for="genre" class="form-label">Genre</label>
    <select name="genre[]" id="genre" class="form-control @error('genre') is-invalid @enderror" multiple >
        @foreach($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </select>

    @error('genre')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $submit }}</button>