<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return view('admin/comment/index')->withComments(Comment::all());
    }

    /**
     * @param $id
     * @return $this
     */
    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();

        return redirect()->back()->withInput()->withErrors(trans('errors.delete-success'));
    }
}
