<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['authors'] = Author::all();
        return view('admin.author.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
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
            'name' => 'required',
            'image' => 'mines:jpeg,png',
        ]);

        $data['name'] = $request->name;
        $data['details'] = $request->details;

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $file->move('images/author/',$file->getClientOriginalName());
            $data['image'] = 'images/author/'.$file->getClientOriginalName();
        }

        Author::create($data);
        session()->flash('success','author created successfully!');
        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        $data['author'] = $author;
        return view('admin.author.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'mines:jpeg,png',
        ]);


        $data['name'] = $request->name;
        $data['details'] = $request->details;

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $file->move('images/author/',$file->getClientOriginalName());
            File::delete($author->image);
            $data['image'] = 'images/author/'.$file->getClientOriginalName();
        }

        $author->update($data);
        session()->flash('success','author Updated successfully!');
        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {

        $author->delete();
        session()->flash('delete','Author Delete successfully!');
        return redirect()->route('author.index');
    }
}
