<!doctype html>
<html lang="en">
<head>
    @include('layouts.font_end._header_link')
</head>
<body>


<div id="loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#f4b214"/>
    </svg>
</div>

<!-- loader -->
<script src="{{ asset('assets/font_end/js/jquery-3.2.1.min.js') }}"></script>

<script src="{{ asset('assets/font_end/js/jquery-migrate-3.0.0.js') }}"></script>
<div class="wrap">

    <header role="banner">
        @include('layouts.font_end._header')
    </header>
    <!-- END header -->

    <!-- START main section -->

    @yield('content')
    <!-- END main section -->

    <footer class="site-footer">
        @include('layouts.font_end._footer')
    </footer>
    <!-- END footer -->

</div>
<!-- script -->
@include('layouts.font_end._script')
</body>
</html>
