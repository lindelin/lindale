<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
	public function index()
	{
		return view('admin/comment/index')->withComments(Comment::all());
	}
	public function destroy($id)
	{
		Comment::find($id)->delete();
		return redirect()->back()->withInput()->withErrors('删除成功！');
	}
}
