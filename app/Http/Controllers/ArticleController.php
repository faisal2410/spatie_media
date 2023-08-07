<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
     public function create()
    {
        return view('article.create');
    }


     public function store()
    {
        /** @var Article $article */
        $article = Article::create();

        $article
            ->addMediaFromRequest('image')
            ->toMediaCollection();
        $article
            ->addMediaFromRequest('image2')
            ->toMediaCollection();

        return back();
    }
}
