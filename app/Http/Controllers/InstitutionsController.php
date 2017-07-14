<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\City\City;
use App\Models\Institution\Institution;
use App\Models\Specialty\Specialty;

class InstitutionsController extends Controller
{
    public function __construct()
    {
        abort_if(
            Institution::doesntHaveType(request()->route('institutionType')), 404
        );
    }

    public function index(Request $request, $institutionType)
    {
        $institutions = Institution::ofType($institutionType)
            ->orderBy('title')
            ->with(['city', 'media'])
            ->paginate(15);

        $cities = City::all()->sortBy('title');

        $specialties = Specialty::of($institutionType)
            ->getOnly('specialties')
            ->orderBy('title')
            ->with(['direction'])
            ->get();

        return view('institutions.index', compact('institutions', 'cities', 'specialties'));
    }

    public function show($institutionType, Institution $institution)
    {
        $institution->load(['specialties' => function ($q) {
            $q
                ->getOnly('specialties')
                ->orderBy('pivot_specialty_id')
                ->with(['qualifications', 'direction']);
        }]);

        return view('institutions.show', compact('institution'));
    }
}
