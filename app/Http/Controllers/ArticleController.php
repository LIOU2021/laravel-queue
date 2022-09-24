<?php

namespace App\Http\Controllers;

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
        $article = Article::find($id);
        $article->views++;
        $article->save();
        return $article->refresh();
    }
}
