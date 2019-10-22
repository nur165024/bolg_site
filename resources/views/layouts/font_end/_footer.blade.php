<div class="container">
    <div class="row mb-5">
        <div class="col-md-4">
            @foreach($abouts as $about)
                <h3>About Us</h3>
                <p class="mb-4">
                    <img src="{{ asset($about->image) }}" alt="Image placeholder" class="img-fluid">
                </p>

                <p>{{ Str::words($about->details,15) }}<a href="{{ route('about.font') }}">Read More</a></p>
            @endforeach
        </div>

        <div class="col-md-6 ml-auto">
            <div class="row">
                <div class="col-md-7">
                    <h3>Latest Post</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            @foreach($latest_posts_limit_3 as $post)
                                <li>
                                    <a href="{{ route('post.details',$post->id) }}">
                                        <img src="{{ asset($post->image) }}" alt="Image placeholder" class="mr-4">
                                        <div class="text">
                                            <h4>{{ $post->title }}</h4>
                                            <div class="post-meta">
                                                <span class="mr-2">{{ $post->created_at }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-1"></div>

                <div class="col-md-4">

                    <div class="mb-5">
                        <h3>Quick Links</h3>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="mb-5">
                        <h3>Social</h3>
                        <ul class="list-unstyled footer-social">
                            @foreach($sociallinks as $sociallink)
                                <li><a target="_blank" href="{{ $sociallink->social_link }}"><span class="fa {{ $sociallink->social_font }}"></span>{{ $sociallink->social_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <p class="small">

                Copyright &copy;
                <script data-cfasync="false"
                        src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                <script>document.write(new Date().getFullYear());</script>
                All Rights Reserved | This template is made with <i class="fa fa-heart text-danger"
                                                                    aria-hidden="true"></i> by <a
                    href="#" target="_blank">Nura Alam</a>

            </p>
        </div>
    </div>
</div>
