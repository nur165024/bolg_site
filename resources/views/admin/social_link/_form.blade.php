<div class="form-group">
    <label for="social_link">Social Link</label>
    <input type="text" name="social_link" value="{{ old('social_link',isset($sociallink) ? $sociallink->social_link:null) }}"
           id="social_link"
           placeholder="Enter your social link"
           class="form-control @error('social_link') is-invalid @enderror">
    @error('social_link')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="social_font">Social Link</label>
    <input type="text" name="social_font" value="{{ old('social_font',isset($sociallink) ? $sociallink->social_font:null) }}"
           id="social_font"
           placeholder="Enter your social font"
           class="form-control @error('social_font') is-invalid @enderror">
    @error('social_font')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="social_name">Social Name</label>
    <input type="text" name="social_name" value="{{ old('social_name',isset($sociallink) ? $sociallink->social_name:null) }}"
           id="social_name"
           placeholder="Enter your social Name"
           class="form-control @error('social_name') is-invalid @enderror">
    @error('social_name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
