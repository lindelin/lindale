<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comment;
use App\Article;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (!Article::find($request->article_id)) {
            return redirect()->to("/")->withInput()->withErrors('评论发表失败！');
        } else if (Comment::create($request->all())) {
        	return redirect()->back();
        }else{
            return redirect()->back()->withInput()->withErrors('评论发表失败！');
        }
    }
}
