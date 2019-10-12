<div class="form-group">
    <label for="title">Category Name</label>
    <input type="text" name="name" value="{{ old('name',isset($category) ? $category->name:null) }}" id="title" placeholder="Enter your Category Name" class="form-control">
</div>

<div class="form-group">
    <label for="details" class="form-control-label">Category details</label>
    <textarea name="details" id="title" placeholder="Enter your Category Details" class="form-control" rows="10">{{ old('details',isset($category)?$category->details:null) }}</textarea>
</div>

