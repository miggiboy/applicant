<?php

namespace App\Http\Controllers\Specialty;

use App\Http\Controllers\Controller;

class SpecialtyDirectionsController extends Controller
{
    const DIRECTION_GROUPS = [
        'agriculture',
        'educationandgum',
        'serviceandsociety',
        'serviceandsocietycollege',
        'natural',
        'mandatorysubjects',
        'technique',
    ];

    public function index()
    {
        return view('specialties.directions.index');
    }

    public function show(String $group)
    {
        abort_unless (
            in_array($group, self::DIRECTION_GROUPS), 404
        );

        return view("specialties.directions.{$group}");
    }
}
