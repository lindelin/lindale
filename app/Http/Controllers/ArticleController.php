<?php

namespace App\Http\Controllers;

use App\Article;

class ArticleController extends Controller
{
    public function show($id)
    {
        return view('article/show')->withArticle(Article::with('hasManyComments', 'hasOneUser')->find($id));
    }
}
