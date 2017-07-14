<?php

namespace App\Modules\Search;

use Illuminate\Http\Request;
use App\Models\Institution\Institution;

class InstitutionSearch
{
    public static function applyFilters(Request $request)
    {
        $q = Institution::query();

        $q->ofType(
            $request->route('institutionType')
        );

        if ($request->has('query')) {
            $q->like(request('query'));
        }

        if ($request->has('city')) {
            $q->in($request->city);
        }

        if ($request->has('specialty')) {
            $q->withSpecialty($request->specialty);
        }

        return $q;
    }
}
