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
        $data['abouts'] = About::orderBy('id','desc')->get();
        return view('admin.about.index',$data);
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
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'image' => 'image|nullable|max:2000',
        ]);

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
        $data['about'] = $about;
        return view('admin.about.edit',$data);
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
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'image' => 'image|nullable|max:2000',
        ]);

        $data['title'] = $request->title;
        $data['details'] = $request->details;

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $file->move('images/about/',$file->getClientOriginalName());
            $data['image'] = 'images/about/'.$file->getClientOriginalName();

            if (file_exists($about->image))
            {
                unlink($about->image);
            }
        }

        $about->update($data);
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
        if (file_exists($about->image))
        {
            unlink($about->image);
        }

        $about->delete();

        session()->flash('delete','About Deleted Successfully!');
        return redirect()->route('about.index');
    }
}
