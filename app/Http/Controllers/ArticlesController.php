<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    Article,
    Category
};

class ArticlesController extends Controller
{
    // TODO: update
    public function index()
    {
        $articles = Article::latest()
            ->take(3)
            ->get();

        return view('welcome', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('article', compact('article'));
    }
}
