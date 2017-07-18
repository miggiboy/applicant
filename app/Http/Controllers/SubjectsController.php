<?php

namespace App\Http\Controllers;

use App\Models\Subject\Subject;

class SubjectsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        $subject->load('media', 'fileCategories');

        $specialties = $subject->getSpecialties()
            ->orderBy('title')
            ->with(['direction', 'subjects'])
            ->get();

        return view('subjects.show', compact('subject', 'specialties'));
    }

}
