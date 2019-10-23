<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request,$id)
    {
        $request->validate([
            'message' => 'required',
        ]);

        $data['user_id'] = Auth::id();
        $data['post_id'] = $id;
        $data['message'] = $request->message;

        Comment::create($data);
        session()->flash('success','comment successfully!');
        return redirect()->back();
    }
}
