<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\City\City;
use App\Models\Institution\Institution;
use App\Models\Specialty\Specialty;

use App\Modules\Search\{
    InstitutionSearch
};

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
        $institutions = InstitutionSearch::applyFilters($request)
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

    public function rtSearch(Request $request, $institutionType)
    {
        $institutions = Institution::select(
                'slug as url', "title", 'abbreviation as description', 'city_id', 'type'
            )
            ->ofType($institutionType)
            ->like($request->input('query'))
            ->orderBy('title')
            ->get();

        $institutions = $institutions->each(function ($item, $key) {
            $item->url = config('app.url')
                . '/institutions/'
                . str_plural($item->type)
                . '/'
                . $item->url;

            $item->description = ($item->description . ' ' ?: '') . City::find($item->city_id)->title; // smth wrong here!
        });

        return response()->json(['results' => $institutions], 200);
    }
}
