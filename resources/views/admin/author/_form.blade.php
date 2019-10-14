<div class="form-group">
    <label for="name">Author Name</label>
    <input type="text" name="name" value="{{ old('name',isset($author) ? $author->name:null) }}" id="name"
           placeholder="Enter your Author Name" class="form-control @error('name') is-invalid @enderror">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="details" class="form-control-label">Author details</label>
    <textarea name="details" id="details" placeholder="Enter your Author Details" class="form-control"
              rows="10">{{ old('details',isset($author) ? $author->details:null) }}</textarea>
</div>

<div class="form-group">
    <label for="image">File Upload</label><br>
    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
           onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">

    @if(isset($author) && $author->image != null)
        <img id="image" src="{{ asset($author->image) }}" width="100" height="100"/>
    @endif

    @error('image')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
