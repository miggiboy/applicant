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
        $specialties = Specialty::inDirection($direction)
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

    public function search(Request $request)
    {
        $q = Specialty::query();

        if ($request->has('query')) {
            $q->like($request->input('query'));
        }

        $specialties = $q->orderBy('title')
            ->with('direction')
            ->paginate(15);

        return view('specialties.search', compact('specialties'));
    }
}
