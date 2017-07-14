<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subject;

class SubjectsController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at')->paginate(3);
        return view('welcome', compact('articles'));
    }
    /**

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($slugOrId)
    {
        $subject = Subject::where('id', $slugOrId)
            ->orWhere('slug', $slugOrId)
            ->firstOrFail();
            
        $subject->load('files', 'fileCategories');
        
        return view('subjects.show', compact('subject'));
    }

}