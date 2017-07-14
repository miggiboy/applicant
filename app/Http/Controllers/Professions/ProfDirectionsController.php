<?php

namespace App\Http\Controllers\Professions;

use App\ProfDirection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfDirectionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directions = ProfDirection::all();

        return view('prof-directions.index', compact('directions'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prof-directions.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:prof_directions'
        ]);

        ProfDirection::create($request->all());

        return redirect()->back()->with('message', 'Проф-направление добавлено.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\ProfDirection  $profDirection
     * @return \Illuminate\Http\Response
     */
    public function show(ProfDirection $profDirection)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProfDirection  $profDirection
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfDirection $profDirection)
    {
        //
    }


}
