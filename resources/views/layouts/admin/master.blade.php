<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin._header_link')
</head>

<body class="animsition">
<div class="page-wrapper">

    <!-- MENU SIDEBAR-->
    @include('layouts.admin._left_menu')
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">

        <!-- HEADER DESKTOP-->
        @include('layouts.admin._header')
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->

</div>

<!-- JS link -->
@include('layouts.admin._script')
</body>

</html>
<!-- end document-->
