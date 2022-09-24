<?php

namespace App\Http\Controllers;

use App\Jobs\ArticleAddView;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return Article::all();
    }

    public function show($id)
    {
        ////併發錯誤範例01
        // $article = Article::find($id);
        // $article->views++;
        // $article->save();
        // return $article->refresh();

        //併發案例正確寫法
        ArticleAddView::dispatch($id)->onQueue('article_views');
    }
}
