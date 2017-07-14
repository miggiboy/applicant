<?php
namespace App\Http\Controllers;
use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
class ArticlesController extends Controller
{
   
    public function index()
    {
        $articles   = Article::orderBy('created_at')->paginate(3);
        return view('welcome', compact('articles'));
    }
    public function show(Article $article)
    {
        return view('article', compact('article'));
    }
}