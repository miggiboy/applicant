<?php

namespace App\Http\Controllers\Specialty;

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
        $specialties = Specialty::in($direction)
            ->orderBy('title')
            ->with('direction')
            ->paginate(15);

        return view('specialties.index', compact('specialties', 'direction'));
    }

    public function show(Specialty $specialty)
    {
         $specialty->load(['professions' => function ($q) {
            $q
                ->orderBy('title')
                ->get();
         }]);

        return view('specialties.show', compact('specialty'));
    }

    public function autocomplete(Request $request){

        $specialties = Specialty::select('id as url', 'title', 'code as description')
            ->like($request->input('query'))
            ->orderBy('title')
            ->get();

        $specialties = $specialties->each(function ($item, $key) {
            $item->url = config('app.url') . '/specialties/' . $item->url;
        });

        return response()->json(['results' => $specialties]);
    }
}
