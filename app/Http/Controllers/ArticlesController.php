<?php

namespace App\Http\Controllers;

use App\Models\Article\Article;

class ArticlesController extends Controller
{
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function showCustom($slug)
    {
        $customArticles = [
            'kak-poluchit-grant',
        ];

        abort_unless(in_array($slug, $customArticles), 404);

        return view("articles/custom/{$slug}");
    }
}
