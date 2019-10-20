<div class="form-group">
    <label for="title">About Title</label>
    <input type="text" name="title" value="{{ old('title',isset($about) ? $about->title:null) }}" id="title"
           placeholder="Enter your About Title" class="form-control @error('title') is-invalid @enderror">
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="details" class="form-control-label">About details</label>
    <textarea name="details" id="details" placeholder="Enter your About Details" class="form-control @error('details') is-invalid @enderror"
              rows="10">{{ old('details',isset($about) ? $about->details:null) }}</textarea>
    @error('details')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="image">File Upload</label><br>
    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
           onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">

    @if(isset($about) && $about->image != null)
        <img id="image" src="{{ asset($about->image) }}" width="100" height="100"/>
    @endif

    @error('image')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
