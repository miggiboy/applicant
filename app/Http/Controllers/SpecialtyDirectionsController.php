<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecialtyDirectionsController extends Controller
{
    const DIRECTION_GROUPS = [
        'agriculture',
        'educationandgum',
        'serviceandsociety',
        'serviceandsocietyc',
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
