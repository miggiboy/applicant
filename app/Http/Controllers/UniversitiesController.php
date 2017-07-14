<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\City;
use App\Direction;
use App\Speciality;
use App\Models\College\College;
use App\Models\University\University;
class UniversitiesController extends Controller
{
    public function index()
    {

        $specialties = Speciality::ofInstitution(1)->with(['direction'])
                ->orderBy('title')
                ->isSpecialty()
                ->get();
        $cities = City::all()->sortBy('title');

        $institutions = University::orderBy('title')->with('city')->paginate(15);
       
        return view('vuzy', compact('institutions', 'cities', 'specialties'));
    }


    public function indexCollege()
    {
        $cities = City::all()->sortBy('title');
        $specialties = Speciality::ofInstitution(0)->with(['direction'])
                ->orderBy('title')
                ->get();
        $institutions = College::orderBy('title')->with('city')->paginate(15);
        return view('vuzy', compact('institutions', 'cities', 'specialties'));
    }

    public function showCollege(College $college)
    {
        $college->load(['specialities' => function ($q) {
            $q->orderBy('college_speciality.speciality_id');
        }]);
        
        return view('colleges.show', compact('college'));
    }


    public function search()
    {
        $q = University::query();
        if (request()->has('query')) {
            $q->like(request('query'));
        }
        if (request()->has('city')) {
            $q->inCity(request('city'));
        }
       if (request()->has('specialty')) {
                    $s_id = request('specialty');
                    $specialty = Speciality::find($s_id);
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
                    }
           $cities = City::all()->sortBy('title');
            $qualifications="";
                    return view('linked_specialities', compact('specialty', 'institutions', 'cities','qualifications'));
                
       }
        
        $institutions = $q->orderBy('paid_rating', 'DESC')
            ->orderBy('title')
            ->with(['city'])
            ->paginate(15);
        $specialties = Speciality::ofInstitution(1)->with(['direction'])
                ->orderBy('title')
                ->isSpecialty()
                ->get();
        $cities = City::all()->sortBy('title');
        return view('vuzy', compact('institutions', 'cities', 'specialties'));
    }
    
      public function searchCollege()
    {
        $q = College::query();
        if (request()->has('specialty')) {
                    $s_id = request('specialty');
                    $specialty = Speciality::find($s_id);
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
                    }
                    $cities = City::all()->sortBy('title');
                   $qualifications='';
                   if ($specialty->type=='specialty'){
                        $qualifications=Speciality::where('parent_id',$specialty->id)
                            ->orderBy('title')
                            ->get();
                    }
                    return view('linked_specialities', compact('specialty', 'institutions', 'cities','qualifications'));
                
            
        }
         if (request()->has('query')) {
            $q->like(request('query'));
        }
        if (request()->has('city')) {
            $q->inCity(request('city'));
        }
          
        
        $institutions = $q->orderBy('paid_rating', 'DESC')
            ->orderBy('title')
            ->with(['city'])
            ->paginate(15);
            
          
       
        $specialties = Speciality::ofInstitution(0)->with(['direction'])
                ->orderBy('title')
                ->get();
            
                
        $cities = City::all()->sortBy('title');
        return view('vuzy', compact('institutions', 'cities', 'specialties'));
    }

    public function show(University $university)
    {
        // dd($university->with('specialities'));
        return view('vuz_profile', compact('university'));
    }
    
    public function autocomplete(Request $request){
        
        $universities = University::select('slug as url', "title as name", 'acronym')
            ->like($request->input('query'))
            ->orderBy('title')
            ->get();

        $universities = $universities->each(function ($item, $key) {
            $item->url = 'https://vipusknik.kz/universities/' . $item->url;
            $item->acronym = $item->acronym ?: '';
        });

        return response()->json(['universities' => $universities]);
    }
    
    public function autocompleteCollege(Request $request){
        
        $colleges = College::select('slug as url', "title as name", 'acronym')
            ->like($request->input('query'))
            ->orderBy('title')
            ->get();

        $colleges = $colleges->each(function ($item, $key) {
            $item->url = 'https://vipusknik.kz/colleges/' . $item->url;
            $item->acronym = $item->acronym ?: '';
        });

        return response()->json(['colleges' => $colleges]);
    }


}
