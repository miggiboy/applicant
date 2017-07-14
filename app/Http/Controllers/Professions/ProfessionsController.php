<?php

namespace App\Http\Controllers\Professions;

use App\Profession;
use App\ProfDirection;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProfessionRequest;
use App\Http\Requests\UpdateProfessionRequest;
use App\Http\Controllers\Controller;

class ProfessionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('professions.index', [
            'profDirections'    => ProfDirection::all()->sortBy('title'),
            'professions'       => Profession::orderBy('title')->paginate(15),
        ]);
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
    public function proflist(ProfDirection $direction, Request $request)
    {
        $professions = Profession::where('prof_direction_id', $direction->id)
            ->orderBy('title')
            ->paginate(15);
                     
        return view('professionslist', compact('professions', 'direction'));
    }
    public function search(Request $request) 
    {
        $q = Profession::query();

        if (request()->has('query')) {
            $q->like(request('query'));
        }

        if (request()->has('direction')) {
            $q->ofDirection(request('direction'));
        }

        $professions = $q->orderBy('title')->paginate(15);
        $profDirections = ProfDirection::all()->sortBy('title');

        $request->flashOnly(['query', 'direction']);

        return view('professions.index', compact('professions', 'profDirections'));
    }
}
