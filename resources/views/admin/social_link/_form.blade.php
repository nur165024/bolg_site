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
