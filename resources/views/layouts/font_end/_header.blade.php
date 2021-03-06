<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-9 social">
                @foreach($sociallinks as $sociallink)
                    <a target="_blank" href="{{ $sociallink->social_link }}"><span class="fa {{ $sociallink->social_font }}"></span></a>
                @endforeach
            </div>
            <div class="col-3 search-top">
                <form action="#" class="search-top-form">
                    <span class="icon fa fa-search"></span>
                    <input type="text" id="s" placeholder="Type keyword to search...">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container logo-wrap">
    <div class="row pt-5">
        <div class="col-12 text-center">
            <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button"
               aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
            <h1 class="site-logo"><a href="{{ route('home') }}">New Blog Site</a></h1>
        </div>
    </div>
</div>

@include('layouts.font_end._nav')
