<?php

namespace App\Http\Controllers\Specialty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\City\City;
use App\Models\Specialty\Specialty;

class SpecialtyInstitutionsController extends Controller
{
    public function index(Request $request, $institutionType, Specialty $specialty)
    {
        $specialty->load(['qualifications', 'institutions' => function ($q) use ($request) {
            if ($request->has('city')) {
                $q->in($request->city);
            }

            if ($request->has('study_form')) {
                $q->wherePivot('form', $request->study_form);
            }

            if ($request->has('qualification')) {
                $q->withSpecialty($request->qualification);
            }
        }]);

        $cities = City::all()->sortBy('title');

        return view('specialties.institutions.index', compact('specialty', 'cities', 'institutionType'));
    }
}
