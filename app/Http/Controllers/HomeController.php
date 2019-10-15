<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::orderBy('id','desc')->get();
        return view('font_end.index',$data);
    }
}
