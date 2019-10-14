<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin._header_link')
</head>

<body class="animsition">
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="{{ asset('assets/admin/images/icon/logo.png') }}" alt="CoolAdmin">
                        </a>
                    </div>
                    @include('layouts.admin._alert')
                    <div class="login-form">
                        <form action="{{ route('login') }}" method="post">

                            @csrf

                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full"
                                       value="{{ old('email') }}" type="email" name="email" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="password"
                                       placeholder="Password">
                            </div>

                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Jquery JS-->
@include('layouts.admin._script')

</body>

</html>
<!-- end document-->
