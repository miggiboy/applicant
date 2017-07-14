<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Speciality;
use App\City;

class SpecialtyInstitutionsController extends Controller
{
    public function index(Request $request, Speciality $specialty)
    {
        if (request()->has('qualification')){
            $specialty = Speciality::find(request('qualification'));
        }
        $qualifications='';
        if($specialty->insitutionType() == 'universities'){
          $specialty->load(['universities' => function ($query) {
              
            if (request()->has('city')) {
            $query->where('city_id', request('city'));
            }
            if (request()->has('form')) {
            $query->wherePivot('form', request('form'));
            }
            }]);
             $institutions=$specialty->universities;
        }
        else{
            
            $specialty->load(['colleges' => function ($query) {
            if (request()->has('city')) {
            $query->where('city_id', request('city'));
            }
            if (request()->has('form')) {
            $query->wherePivot('form', request('form'));
            }
            }]);
            $institutions=$specialty->colleges;
            if ($specialty->type=='specialty'){
                $qualifications=Speciality::where('parent_id',$specialty->id)
                    ->orderBy('title')
                    ->get();
            }
        }
        $cities = City::all()->sortBy('title');
       
        return view('linked_specialities', compact('specialty', 'institutions', 'cities', 'qualifications'));
    }
}
