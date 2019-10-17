<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Post;
use App\Sociallink;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::orderBy('name')->get();
        $data['authors'] = Author::all();
        $data['sociallinks'] = Sociallink::all();
        $data['popular_posts'] = Post::with(['category','author'])->published()->orderBy('total_hit','desc')->limit(3)->get();
        $data['featured_posts'] = Post::with(['category','author'])->where('is_featured',1)->published()->get();
        $data['latest_posts'] = Post::with(['category','author'])->orderBy('id','desc')->published()->paginate(4);
        return view('font_end.index',$data);
    }

    public function details($id){
        $post = Post::with(['category','author'])->findorFail($id);
        $post->increment('total_hit');
        $data['post'] = $post;
        $data['related_post'] = Post::with(['category','author'])->published()->where('category_id',$post->category_id)->orderBy('id','desc')->limit(3)->get();
        $data['popular_posts'] = Post::with(['category','author'])->published()->orderBy('total_hit','desc')->limit(3)->get();
        $data['categories'] = Category::orderBy('name')->get();
        $data['authors'] = Author::all();
        $data['sociallinks'] = Sociallink::all();
        return view('font_end.details',$data);
    }

    public function category($id)
    {
        $data['categories'] = Category::orderBy('name')->get();
        $data['authors'] = Author::all();
        $data['sociallinks'] = Sociallink::all();
        $data['popular_posts'] = Post::with(['category','author'])->published()->orderBy('total_hit','desc')->limit(3)->get();
        $data['posts'] = Post::with(['category','author'])->published()->where('category_id',$id)->paginate(2);
        return view('font_end.category_post',$data);
    }
}
