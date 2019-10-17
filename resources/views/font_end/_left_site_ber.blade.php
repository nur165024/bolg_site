<div class="col-md-12 col-lg-4 sidebar">
    <div class="sidebar-box">
        <h3 class="heading">Popular Posts</h3>
        <div class="post-entry-sidebar">
            <ul>
                @foreach($popular_posts as $post)
                    <li>
                        <a href="{{ route('post.details',$post->id) }}">
                            <img src="{{ asset($post->image) }}" alt="Image placeholder" class="mr-4">
                            <div class="text">
                                <h4>{{ $post->title }}</h4>
                                <div class="post-meta">
                                    <span class="mr-2">March 15, 2018 </span>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- END sidebar-box -->

    <div class="sidebar-box">
        <h3 class="heading">Categories</h3>
        <ul class="categories">
            @foreach($categories as $category)
                <li><a href="{{ route('category',$category->id) }}">{{ $category->name }} <span>({{ $category->post->count() }})</span></a></li>
            @endforeach
        </ul>
    </div>
    <!-- END sidebar-box -->

    <div class="sidebar-box">
        <h3 class="heading">Tags</h3>
        <ul class="tags">
            <li><a href="#">Travel</a></li>
            <li><a href="#">Adventure</a></li>
            <li><a href="#">Food</a></li>
            <li><a href="#">Lifestyle</a></li>
            <li><a href="#">Business</a></li>
            <li><a href="#">Freelancing</a></li>
            <li><a href="#">Travel</a></li>
            <li><a href="#">Adventure</a></li>
            <li><a href="#">Food</a></li>
            <li><a href="#">Lifestyle</a></li>
            <li><a href="#">Business</a></li>
            <li><a href="#">Freelancing</a></li>
        </ul>
    </div>
</div>
