<?php

namespace App\Http\Controllers;

use App\Models\Article\{
    Article,
    Category
};

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest()
            ->take(3)
            ->get();

        return view('home', compact('articles'));
    }
}
