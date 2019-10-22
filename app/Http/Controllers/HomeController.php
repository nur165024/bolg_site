<?php

namespace App\Http\Controllers;

use App\About;
use App\Author;
use App\Category;
use App\Contact;
use App\Post;
use App\Sociallink;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['abouts'] = About::all();
        $data['categories'] = Category::orderBy('name')->get();
        $data['authors'] = Author::all();
        $data['sociallinks'] = Sociallink::all();
        $data['popular_posts'] = Post::with(['category','author'])->published()->orderBy('total_hit','desc')->limit(3)->get();
        $data['featured_posts'] = Post::with(['category','author'])->where('is_featured',1)->published()->get();
        $data['latest_posts'] = Post::with(['category','author'])->orderBy('id','desc')->published()->paginate(4);
        $data['latest_posts_limit_3'] = Post::orderBy('id','desc')->published()->limit(3)->get();
        return view('font_end.index',$data);
    }

    public function details($id){
        $data['abouts'] = About::all();
        $post = Post::with(['category','author'])->findorFail($id);
        $post->increment('total_hit');
        $data['post'] = $post;
        $data['related_post'] = Post::with(['category','author'])->published()->where('category_id',$post->category_id)->orderBy('id','desc')->limit(3)->get();
        $data['popular_posts'] = Post::with(['category','author'])->published()->orderBy('total_hit','desc')->limit(3)->get();
        $data['categories'] = Category::orderBy('name')->get();
        $data['authors'] = Author::all();
        $data['sociallinks'] = Sociallink::all();
        $data['latest_posts_limit_3'] = Post::orderBy('id','desc')->published()->limit(3)->get();
        return view('font_end.details',$data);
    }

    public function category($id)
    {
        $data['abouts'] = About::all();
        $data['categories'] = Category::orderBy('name')->get();
        $data['authors'] = Author::all();
        $data['sociallinks'] = Sociallink::all();
        $data['popular_posts'] = Post::with(['category','author'])->published()->orderBy('total_hit','desc')->limit(3)->get();
        $data['posts'] = Post::with(['category','author'])->published()->where('category_id',$id)->paginate(2);
        $data['latest_posts_limit_3'] = Post::orderBy('id','desc')->published()->limit(3)->get();
        return view('font_end.category_post',$data);
    }

    public function about()
    {
        $data['abouts'] = About::all();
        $data['categories'] = Category::orderBy('name')->get();
        $data['sociallinks'] = Sociallink::all();
        $data['latest_posts_limit_3'] = Post::orderBy('id','desc')->published()->limit(3)->get();
        $data['popular_posts'] = Post::with(['category','author'])->published()->orderBy('total_hit','desc')->limit(3)->get();
        $data['latest_posts'] = Post::with(['category','author'])->orderBy('id','desc')->published()->paginate(4);
        return view('font_end.about',$data);
    }

    public function contact()
    {
        $data['abouts'] = About::all();
        $data['categories'] = Category::orderBy('name')->get();
        $data['sociallinks'] = Sociallink::all();
        $data['latest_posts_limit_3'] = Post::orderBy('id','desc')->published()->limit(3)->get();
        $data['popular_posts'] = Post::with(['category','author'])->published()->orderBy('total_hit','desc')->limit(3)->get();
        return view('font_end.contact',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        Contact::create($request->except('_token'));
        session()->flash('success','message send successfully!');
        return redirect()->back();
    }
}
