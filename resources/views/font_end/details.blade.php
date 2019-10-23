@extends('layouts.font_end.master')

@section('title','Post Details')

@section('content')
    <section class="site-section py-lg">
        <div class="container">

            <div class="row blog-entries element-animate">

                <div class="col-md-12 col-lg-8 main-content">
                    <img src="{{ asset($post->image) }}" alt="Image" class="img-fluid mb-5">
                    <div class="post-meta">
                        <span class="author mr-2"><img src="{{ asset($post->author->image) }}"
                                                       alt="Colorlib"
                                                       class="mr-2">{{ $post->author->name }}</span>&bullet;
                        <span class="mr-2">{{ date('d M, Y') }}</span>
                    </div>
                    <h1 class="mb-4">{{ $post->title }}</h1>
                    <a class="category mb-5" href="#">{{ $post->category->name }}</a>

                    <div class="post-content-body">
                        <p>{{ $post->details }}</p>
                    </div>


                    <div class="pt-5">
                        <p>Categories: <a href="#">{{ $post->category->name }}</a> Tags: <a href="#">#manila</a>, <a
                                href="#">#asia</a></p>
                    </div>


                    <div class="pt-5">
                        <h3 class="mb-5">{{ $post->comments()->count() }} Comments</h3>
                        <ul class="comment-list">
                            @foreach($post->comments as $comment)
                                <li class="comment">
                                    <div class="vcard">
                                        <img src="{{ asset($comment->user->user_image) }}" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3>{{ $comment->user->name }}</h3>
                                        <div class="meta">{{ $comment->created_at }}</div>
                                        <p>{{ $comment->message }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <!-- END comment-list -->

                        @guest
                            <p>plz login then comment <a
                                    href="{{ route('user.login') }}">login</a></p>
                        @else
                            <div class="comment-form-wrap pt-5">
                                @include('layouts.admin._alert')
                                <h3 class="mb-5">Leave a comment</h3>
                                <form action="{{ route('comment.store',$post->id) }}" method="post" class="p-5 bg-light">

                                    @csrf

                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" rows="10" class="form-control"></textarea>
                                        @error('message')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button class="btn btn-primary">post comment</button>

                                </form>
                            </div>
                        @endguest
                    </div>

                </div>

                <!-- END main-content -->

                @include('font_end._left_site_ber')
                <!-- END sidebar -->

            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-3 ">Related Post</h2>
                </div>
            </div>
            <div class="row">
                @foreach($related_post as $post)
                    <div class="col-md-6 col-lg-4">
                        <a href="#" class="a-block sm d-flex align-items-center height-md"
                           style="background-image: url({{ asset($post->image) }}); ">
                            <div class="text">
                                <div class="post-meta">
                                    <span class="category">{{ $post->category->name }}</span>
                                    <span class="mr-2">March 15, 2018 </span> &bullet;
                                </div>
                                <h3>{{ $post->title }}</h3>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>


    </section>
@endsection
