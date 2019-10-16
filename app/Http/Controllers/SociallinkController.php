<?php

namespace App\Http\Controllers;

use App\Sociallink;
use Illuminate\Http\Request;

class SociallinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sociallinks'] = Sociallink::orderBy('id','desc')->get();
        return view('admin.social_link.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social_link.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Sociallink::create($request->except('_token'));

        session()->flash('success','Social link Created Successfully!');
        return redirect()->route('sociallink.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sociallink  $sociallink
     * @return \Illuminate\Http\Response
     */
    public function show(Sociallink $sociallink)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sociallink  $sociallink
     * @return \Illuminate\Http\Response
     */
    public function edit(Sociallink $sociallink)
    {
        $data['sociallink'] = $sociallink;
        return view('admin.social_link.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sociallink  $sociallink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sociallink $sociallink)
    {
        $sociallink->update($request->except('_token'));

        session()->flash('success','Social link Updated successfully!');
        return redirect()->route('sociallink.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sociallink  $sociallink
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sociallink $sociallink)
    {
        $sociallink->delete();

        session()->flash('delete','social link deleted successfully!');
        return redirect()->route('sociallink.index');
    }
}
