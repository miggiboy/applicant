<?php
namespace App\Models\College;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \App\City;
use \App\Speciality;

use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

use App\Traits\Institution\HasMap;



class College extends Model implements HasMediaConversions
{    
    use SoftDeletes, HasMap;
    use HasMediaTrait;
    
    protected $guarded = [];
    
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function hazSpec($query, $specialtyID, $studyForm = '1')
    {
        return $query->whereHas('specialities', function ($query) use ($specialtyID, $studyForm) {
            
            $query
                ->wherePivot('speciality_id', $specialtyID)
                ->wherePivot('form', $studyForm);
                
        });
    }

    public function getBaseUrl()
    {
        return parse_url($this->web_site)['host'] ?? $this->web_site;
    }
    
    
    public function getWebSiteAttribute($value)
    {
        if (! $value) {
            return null;
        }
        if (! preg_match('/^http(s)?:\/\//', $value)) {
            return "http://{$value}";
        }
        return $value;
    }
    
    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
              ->width(368)
              ->height(232)
              ->sharpen(10);
    }
    
    /**
     * Relations
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function reception()
    {
        return $this->hasOne(CollegeReception::class);
    }
    public function specialities()
    {
        return $this->belongsToMany(Speciality::class)
            ->withPivot('study_price', 'study_period', 'form');
    }
    /**
     * Helpers
     */
    public function addReception(CollegeReception $reception)
    {
        return $this->reception()->save($reception);
    }
    
    public function getFullTimeSpecialities()
    {
        return $this->specialities()->wherePivot('form', 1)->get();
    }
    public function getExtramuralSpecialities()
    {
        return $this->specialities()->wherePivot('form', 0)->get();
    }
    public function hasReception()
    {
        return (bool) $this->reception()->count();
    }
    /**
     * Search scopes
     */
    //No used
    public function scopeInCities($query, $cities)
    {
        $query->whereHas('city', function($q) use ($cities) {
            $q->whereIn('id', $cities);
        });
    }
    public function scopeLike($query, $queryString)
    {
        $query
            ->where('title', 'like', "%{$queryString}%")
            ->orWhere('acronym', 'like', "%{$queryString}%");
    }
    public function scopeInCity($query, $city)
    {
        $query->where('city_id', $city);
    }
    //No used
    public function scopeHasSpecialities($query, $has)
    {
        if ((bool) $has === true) {
            $query->has('specialities');
        } else {
            $query->doesntHave('specialities');
        }
    }
    //No used
    public function scopeHasReception($query, $has)
    {
        if ((bool) $has === true) {
            $query->has('reception');
        } else {
            $query->doesntHave('reception');
        }
    }
}