<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['abouts'] = About::all();
        return view('admin.about.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $data['title'] = $request->title;
        $data['details'] = $request->details;

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $file->move('images/about/',$file->getClientOriginalName());
            $data['image'] = 'images/about/'.$file->getClientOriginalName();
        }

        About::create($data);
        session()->flash('success','About Created Successfully!');
        return redirect()->route('about.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $data['title'] = $request->title;
        $data['details'] = $request->details;

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $file->move('images/about/',$file->getClientOriginalName());
            $data['image'] = 'images/about/'.$file->getClientOriginalName();
            if (file_exists('image'))
            {
                unlink($this->image);
            }
        }

        About::create($data);
        session()->flash('success','About Updated Successfully!');
        return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        $about->delete();

        session()->flash('delete','About Deleted Successfully!');
        return redirect()->route('about.index');
    }
}
