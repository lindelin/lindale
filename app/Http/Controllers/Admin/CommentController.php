<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        return view('admin/comment/index')->withComments(Comment::all());
    }

    public function destroy($id)
    {
        Comment::find($id)->delete();

        return redirect()->back()->withInput()->withErrors(trans('errors.delete-success'));
    }
}
