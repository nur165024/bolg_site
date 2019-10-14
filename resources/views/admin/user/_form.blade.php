<div class="form-group">
    <label>Username</label>
    <input class="au-input au-input--full @error('name') is-invalid @enderror"
           value="{{ old('name',isset($user)?$user->name:null) }}" type="text"
           name="name" placeholder="Username">
    @error('name')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label>Email Address</label>
    <input class="au-input au-input--full @error('email') is-invalid @enderror" value="{{ old('email',isset($user)?$user->email:null) }}" type="email"
           name="email" placeholder="Email">
    @error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label>Password</label>
    <input class="au-input au-input--full @error('password') is-invalid @enderror" value="{{ old('password',isset($user)?$user->password:null) }}"
           type="password" name="password" placeholder="Password">
    @error('password')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label>User Image</label>
    <input class="form-control" type="file" name="user_image"
           onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">

    @if(isset($user) && $user->user_image != null)
        <img id="image" src="{{ asset($user->user_image) }}" width="100" alt="">
    @endif
</div>
