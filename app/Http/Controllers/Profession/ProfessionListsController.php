<?php

namespace App\Http\Controllers\Profession;

use App\Http\Controllers\Controller;

class ProfessionListsController extends Controller
{
    const LISTS = [
        'mostwantedworld',
        'mostwantedkz',
        'wellpaidkz',
        'wellpaidworld',
    ];

    public function show(String $list)
    {
        abort_unless (in_array($list, self::LISTS), 404);

        return view("professions.lists.{$list}");
    }
}
