<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Subject\Subject;

class UNTController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();

        return view('UNT.index', compact('subjects'));
    }

    public function testent()
    {
        return view('UNT.testent');
    }
}
