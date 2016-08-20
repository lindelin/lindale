<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @param $order
     * @return mixed
     */
    public function index($order = 0)
    {
        switch ($order) {
            case 0:
                return view('admin/article/index')->withArticles(\App\Article::latest()->paginate(5));
                break;
            case 1:
                return view('admin/article/index')->withArticles(\App\Article::oldest()->paginate(5));
                break;
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin/article/create');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin/article/edit')->withArticle(Article::findOrFail($id));
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255',
            'body' => 'required',
        ]);

        $article = new Article();
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id;

        if ($article->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors(trans('errors.save-fail'));
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:articles,title,'.$id.'|max:255',
            'body' => 'required',
        ]);

        $article = Article::findOrFail($id);
        $this->authorize('update', $article);

        $article->title = $request->get('title');
        $article->body = $request->get('body');

        if ($article->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors(trans('errors.update-fail'));
        }
    }

    /**
     * @param $id
     * @return $this
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $this->authorize('delete', $article);
        Comment::where('article_id', '=', $id)->delete();
        $article->delete();

        return redirect()->back()->withInput()->withErrors(trans('errors.delete-success'));
    }
}
