@extends('layouts.font_end.master')

@section('title','New Blog Site')

@section('content')
    <section class="site-section pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="owl-carousel owl-theme home-slider">
                        @foreach($featured_posts as $post)
                            <div>
                                <a href="{{ route('post.details',$post->id) }}" class="a-block d-flex align-items-center height-lg"
                                   style="background-image: url({{ asset($post->image) }}); ">
                                    <div class="text half-to-full">
                                        <span class="category mb-5">{{ $post->category->name }}</span>
                                        <div class="post-meta">

                                            <span class="author mr-2"><img src="{{ asset($post->author->image) }}" alt="Colorlib">{{ $post->author->name }}</span>&bullet;
                                            <span class="mr-2">{{ date('D m, Y') }}</span>

                                        </div>
                                        <h3>{{ $post->title }}</h3>
                                        <p>{{ Str::words($post->details,10) }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="site-section py-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="mb-4">Latest Posts</h2>
                </div>
            </div>
            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">
                    <div class="row">
                        @foreach($latest_posts as $post)
                            <div class="col-md-6">
                                <a href="{{ route('post.details',$post->id) }}" class="blog-entry element-animate" data-animate-effect="fadeIn">
                                    <img src="{{ $post->image }}" alt="Image placeholder">
                                    <div class="blog-content-body">
                                        <div class="post-meta">
                                            <span class="author mr-2"><img src="{{ asset($post->author->image) }}" alt="Colorlib">{{ $post->author->name }}</span>&bullet;
                                            <span class="mr-2">{{ date('d M, Y') }}</span>
                                        </div>
                                        <h2>{{ $post->title }}</h2>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    {{ $latest_posts->links() }}
                </div>

                <!-- END main-content -->

               @include('font_end._left_site_ber')
                <!-- END sidebar -->

            </div>
        </div>
    </section>
@endsection
