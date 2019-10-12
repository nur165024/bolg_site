<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ asset('assets/admin/images/icon/logo.png') }}" alt="Cool Admin"/>
        </a>
    </div>

    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>

                <li class="active has-sub">
                    <a class="js-arrow" href="{{ route('post.index') }}">
                        <i class="fas fa-folder-open"></i>Post</a>
                </li>

                <li class="active has-sub">
                    <a class="js-arrow" href="{{ route('post.index') }}">
                        <i class="fas fa-bars"></i>Category</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
