<div class="form-group">
    <label>Username</label>
    <input class="au-input au-input--full" value="{{ old('name',isset($user)?$user->name:null) }}" type="text"
           name="name" placeholder="Username">
</div>

<div class="form-group">
    <label>Email Address</label>
    <input class="au-input au-input--full" value="{{ old('email',isset($user)?$user->email:null) }}" type="email" name="email" placeholder="Email">
</div>

<div class="form-group">
    <label>Password</label>
    <input class="au-input au-input--full" value="{{ old('password',isset($user)?$user->password:null) }}" type="password" name="password" placeholder="Password">
</div>

<div class="form-group">
    <label>User Image</label>
    <input class="form-control" type="file" name="user_image" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
    @if(isset($user) && $user->user_image != null)
        <img id="image" src="{{ asset($user->user_image) }}" width="100" alt="">
    @endif
</div>
