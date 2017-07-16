<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Specialty\{
    Specialty,
    SpecialtyDirection
};

class SpecialtiesController extends Controller
{
    public function index(SpecialtyDirection $direction)
    {
        $specialties = Specialty::inDirection($direction->id)
            ->orderBy('title')
            ->with(['direction'])
            ->paginate(15);

        return view('specialties.index', compact('specialties'));
    }

    public function show(Specialty $specialty)
    {
         $professions = $specialty->professions()
            ->orderBy('title')
            ->get();

        return view('specialties.show', compact('specialty'));
    }

    public function search(Request $request)
    {
        $q = Specialty::query();

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

        $specialties = $q->orderBy('title')->with(['direction'])->paginate(15);

        $request->flashOnly(['query', 'direction', 'inst']);

        return view('specialties_search', compact('specialties', 'directions'));
    }

    public function autocomplete(Request $request){

        $specialties = Specialty::select('id as url', 'title', 'code')
            ->like($request->input('query'))
            ->orderBy('title')
            ->get();

        $specialties = $specialties->each(function ($item, $key) {
            $item->url = 'http://mustim09.beget.tech/specialties/' . $item->url;
        });

        return response()->json(['specialties' => $specialties]);
    }
}
