<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSpecialityRequest;
use App\Http\Requests\UpdateSpecialityRequest;
use App\Http\Controllers\Controller;


use App\{Direction, Subject, Speciality};

class SpecialitiesController extends Controller
{

    public function index(Request $request)
    {
        if (! $request->has('inst')) {
            $directions     = Direction::all()->sortBy('title');
            $specialities   = Speciality::orderBy('title')->with(['direction'])->paginate(15);
        } else {
            $directions = Direction::where('institution', (bool) $request->inst)
                ->orderBy('title')
                ->get();

            $specialities = Speciality::ofInstitution($request->inst)->with(['direction'])
                ->orderBy('title')
                ->paginate(15);
        }

        return view('specialities.index', compact('specialities', 'directions'));
    }
    public function specialitieslist(Direction $direction, Request $request)
    {
        $specialities = Speciality::where('direction_id', $direction->id)
            ->orderBy('title')
            ->paginate(15);
                     
        return view('specialitieslist', compact('specialities', 'direction'));
    }
    public function show(Speciality $speciality)
    {
         $professions = $speciality->professions()
            ->orderBy('title')
            ->get();
            
        return view('specialities.show', compact('speciality', 'professions'));
    }

    public function search(Request $request) 
    {
        $q = Speciality::query();

        if (request()->has('query')) {
            $q->like(request('query'));
        }

        if (request()->has('direction')) {
            $q->inDirection(request('direction'));
        }

        if ($request->has('inst')) {
            $q->ofInstitution($request->inst);
        }

        $directions = Direction::where('institution', (bool) $request->inst)
                ->orderBy('title')
                ->get();

        $specialities = $q->orderBy('title')->with(['direction'])->paginate(15);

        $request->flashOnly(['query', 'direction', 'inst']);

        return view('specialities_search', compact('specialities', 'directions'));
    }

    public function autocomplete(Request $request){
        
        $specialities = Speciality::select('id as url', 'title', 'code')
            ->like($request->input('query'))
            ->orderBy('title')
            ->get();

        $specialities = $specialities->each(function ($item, $key) {
            $item->url = 'http://mustim09.beget.tech/specialities/' . $item->url;
        });

        return response()->json(['specialities' => $specialities]);
    }
}
