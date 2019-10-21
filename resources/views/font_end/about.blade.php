@extends('layouts.font_end.master')

@section('title','About')

@section('content')
    <section class="site-section pt-5">
        <div class="container">

            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">

                    <div class="row">
                        @foreach($abouts as $about)
                            <div class="col-md-12">
                                <h2 class="mb-4">{{ $about->title }}</h2>
                                <p class="mb-5"><img src="{{ asset($about->image) }}" alt="Image placeholder"
                                                     class="img-fluid"></p>
                                <p>{{ $about->details }}</p>
                            </div>
                        @endforeach
                    </div>

                    <div class="row mb-5 mt-5">
                        <div class="col-md-12 mb-5">
                            <h2>My Latest Posts</h2>
                        </div>
                        <div class="col-md-12">
                            @foreach($latest_posts as $post)
                                <div class="post-entry-horzontal">
                                    <a href="blog-single.html">
                                        <div class="image"
                                             style="background-image: url({{ asset($post->image) }});"></div>
                                        <span class="text">
                                      <div class="post-meta">
                                        <span class="author mr-2"><img src="{{ asset($post->author->image) }}" alt="Colorlib"> Colorlib</span>&bullet;
                                        <span class="mr-2">{{ $post->created_at }}</span>
                                      </div>
                                      <h2>{{ $post->title }}</h2>
                                    </span>
                                    </a>
                                </div>
                        @endforeach

                        <!-- END post -->

                        </div>
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
