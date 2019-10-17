@extends('layouts.font_end.master')

@section('title','Category Post')

@section('content')
    <section class="site-section pt-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h2 class="mb-4"></h2>
                </div>
            </div>
            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">
                    <div class="row mb-5 mt-5">

                        <div class="col-md-12">

                            <div class="post-entry-horzontal">
                                @foreach($posts as $post)
                                    <a href="{{ route('post.details',$post->id) }}">
                                        <div class="image element-animate" data-animate-effect="fadeIn"
                                             style="background-image: url({{ asset($post->image) }});"></div>
                                        <span class="text">
                                          <div class="post-meta">
                                            <span class="author mr-2"><img
                                                    src="{{ asset($post->author->image) }}" alt="Colorlib"> Colorlib</span>&bullet;
                                            <span class="mr-2">March 15, 2018 </span>
                                            <span class="mr-2">{{ $post->category->name }}</span>
                                          </div>
                                          <h2>{{ $post->title }}</h2>
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                            <!-- END post -->
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>

                <!-- END main-content -->

            @include('font_end._left_site_ber')
            <!-- END sidebar -->

            </div>
        </div>
    </section>
@endsection
