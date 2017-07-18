<?php

namespace App\Http\Controllers\Profession;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Profession\{
    Profession,
    ProfessionCategories
};

class ProfessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ProfessionCategories $category)
    {
        $professions = Profession::of($category)
            ->orderBy('title')
            ->with(['category'])
            ->paginate(15);

        return view('professions.index', compact('professions', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show(Profession $profession)
    {
        return view('professions.show', compact('profession'));
    }
}
