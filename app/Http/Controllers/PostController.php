<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['serial'] = 1;
        $data['posts'] = Post::orderBy('id','desc')->get();
        return view('admin.post.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::orderBy('name')->get();
        $data['authors'] = Author::orderBy('name')->get();
        return view('admin.post.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'author_id' => 'required',
            'title' => 'required',
            'details' => 'required',
            'status' => 'required',
            'image' => 'mimes:png,jpeg',
        ]);

        $data['category_id'] = $request->category_id;
        $data['author_id'] = $request->author_id;
        $data['title'] = $request->title;
        $data['status'] = $request->status;
        $data['details'] = $request->details;
        if ($request->has('is_featured'))
        {
            $data['is_featured'] = $request->is_featured;
        }

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $file->move('images/post/',$file->getClientOriginalName());
            $data['image'] = 'images/post/'.$file->getClientOriginalName();
        }

        Post::create($data);
        session()->flash('success','post created successfully!');
        return redirect()->route('post.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data['post'] = $post;
        $data['categories'] = Category::all();
        $data['authors'] = Author::all();
        return view('admin.post.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_id' => 'required',
            'author_id' => 'required',
            'title' => 'required',
            'details' => 'required',
            'status' => 'required',
            'image' => 'mimes:png,jpeg',
        ]);

        $data['category_id'] = $request->category_id;
        $data['author_id'] = $request->author_id;
        $data['title'] = $request->title;
        $data['status'] = $request->status;
        $data['details'] = $request->details;

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $file->move('images/post/',$file->getClientOriginalName());
            File::delete($post->image);
            $data['image'] = 'images/post/'.$file->getClientOriginalName();
        }

        $post->update($data);
        session()->flash('success','post updated successfully!');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('delete','post deleted successfully!');
        return redirect()->route('post.index');
    }
}
