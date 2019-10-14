<div class="form-group">
    <label for="title">Category Name</label>
    <select name="category_id" id="category" class="form-control">
        <option>--select--</option>
        @foreach($categories as $category)
            <option @if(old('category_id',isset($post) ? $post->category_id:null)) selected
                    @endif value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
        @error('category_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </select>
</div>

<div class="form-group">
    <label for="title">Author Name</label>
    <select name="author_id" id="author" class="form-control">
        <option>--select--</option>
        @foreach($authors as $author)
            <option @if(old('author_id',isset($post) ? $post->author_id:null)) selected
                    @endif value="{{ $author->id }}">{{ $author->name }}</option>
        @endforeach
        @error('author_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </select>
</div>

<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" name="title" value="{{ old('title',isset($post)?$post->title:null) }}" id="title"
           placeholder="Enter your Post Title" class="form-control @error('title') is-invalid @enderror">
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="details" class="form-control-label">Post details</label>
    <textarea name="details" id="title" placeholder="Enter your Post Details" class="form-control @error('details') is-invalid @enderror"
              rows="10">{{ old('details',isset($post)?$post->details:null) }}</textarea>
    @error('details')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="image">File Upload</label><br>
    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
           onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">

    @if(isset($post) && $post->image != null)
        <img id="image" src="{{ asset($post->image) }}" width="100" height="100"/>
    @endif
    @error('image')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
