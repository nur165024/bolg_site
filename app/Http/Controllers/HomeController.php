<?php

namespace App\Http\Controllers;

use App\Category;
use App\Sociallink;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::orderBy('name')->get();
        $data['sociallinks'] = Sociallink::all();
        return view('font_end.index',$data);
    }
}
