<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\College\College;
use App\Models\University\University;
class Speciality extends Model
{
   /**
     * Get the route key for the model.
     *
     * @return string
     */
      use SoftDeletes;
     
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
 public function scopeIsSpecialty($query)
   {
        return $query->where('type', 'specialty');
   }
    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }

    public function universities()
    {
        return $this->belongsToMany(University::class)
            ->withPivot('study_price', 'study_period', 'form');
    }
     public function colleges()
    {
        return $this->belongsToMany(\App\Models\College\College::class)
            ->withPivot('study_price', 'study_period', 'form');
    }

    public function professions()
    {
        return $this->belongsToMany(Profession::class)
            ->select(['id', 'title', 'slug', 'prof_direction_id'])
            ->orderBy('title');
    }
    
    

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Split user provided string of specialityName_specialityCode format
     * into array with the corresponding elements 
     * 
     * @param  string $value
     * @return array
     */
    public function isQualification()
   {
       return $this->type == 'qualification';
   }
   public function insitutionType()
   {
        if ($this->isQualification()) {
            return 'colleges';
        }

        return ($this->direction->institution == '1')
            ? 'universities'
            : 'colleges';
   }

   public function getTranslatedInsitutionType()
   {
       return ($this->insitutionType() == 'universities')
            ? 'Университеты'
            : 'Колледжи';
   }

   public function getInstitutions()
   {
       $related = ($this->insitutionType() == 'universities')
            ? $this->universities()
            : $this->colleges();

        return $related->orderBy('title')->get();
   }
    public static function parseUserAddedSpeciality($value)
    {
        $value = trim($value, '_');

        if (! stripos($value, '_')) {
            return ['title' => $value, 'code' => null];
        }

        return [
            'title' => explode('_', $value)[0], 
            'code'  => explode('_', $value)[1],
        ];
    }

    /**
     * Returns string with specialty's subject names 
     * concatenated with | symbol
     * 
     * @return string
     */
    public function getSubjectNames() 
    {
        return $this->subjects->implode('title', ' | ');
    }

    /**
     * Check if the specialty has any subjects
     * 
     * @return boolean
     */
    public function hasSubjects() 
    {
        return (bool) $this->subjects()->count();
    }

    /**
     * Returns specialty name with specialty code if the last
     * is present in the DB
     * otherwise return only speciality name
     *  
     * @return string
     */
    public function getNameWithCodeOrName() {
        
        if ($this->title && $this->code) {
            return "{$this->title} ({$this->code})";
        }

        if ($this->title) {
            return $this->title;
        }

        return null;
    }

    /**
     * Returns all specialties which are being tought in universities
     * 
     * @return \Illuminate\Support\Collection
     */
    public static function getUniversitySpecialities()
    {
        $specialities = Speciality::whereHas('direction', function ($query) {
            $query->where('institution', 1);
        })->orderBy('title')->get();

        return $specialities;
    }

    /**
     * Returns all specialties which are being tought in colleges
     * 
     * @return \Illuminate\Support\Collection
     */
    public static function getCollegeSpecialities()
    {
        $specialities = Speciality::whereHas('direction', function ($query) {
            $query->where('institution', 0);
        })->orderBy('title')->get();

        return $specialities;
    }

    /**
     * Checks if this specialty is already linked to the profession
     * 
     * @param  integer $profession
     * @return boolean
     */
    public function hasSpeciality($specialityId, $form = 1)
    {
        return (bool) $this->professions()
            ->wherePivot('profession_id', $profession)
            ->count();
    }

    public function scopeOfCollege($query) 
    {
        return $query->whereHas('direction', function($q) {
            $q->where('institution', 0);
        });
    }

    public function scopeOfUniversity($query) 
    {
        return $query->whereHas('direction', function ($q) {
            $q->where('institution', 1);
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Search scopes
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Filters out specialties which don't have the subject 
     * as one of it's subjects
     *
     * @param integer $subjectId
     * @return \Illuminate\Support\Collection
     */
    public function scopeHasSubject($query, $subjectId)
    {
        $query->whereHas('subjects', function($q) use($subjectId) {
            $q->where('id', $subjectId);
        });
    }

    /**
     * Filters out specialties which don't belong to this direction
     *
     * @param integer $directionId
     * @return \Illuminate\Support\Collection
     */
    public function scopeInDirection($query, $directionId)
    {
        $query->whereHas('direction', function($q) use($directionId) {
            $q->where('id', $directionId);
        });
    }

    /**
     * Filters out specialties which don't belong to this institution
     *
     * @param integer $institution
     * @return \Illuminate\Support\Collection
     */
    public function scopeOfInstitution($query, $institution) 
    {
        $query->whereHas('direction', function($q) use($institution) {
            $q->where('institution', $institution);
        });
    }

    /**
     * Filters out specialties which title or code is not like query parameter
     *
     * @param string $queryString
     * @return \Illuminate\Support\Collection
     */
    public function scopeLike($query, $queryString)
    {
        $query
            ->where('title', 'like', "%{$queryString}%")
            ->orWhere('code', 'like', "%{$queryString}%");
    }

    /**
     * Filters out specialties which have reception committee
     *
     * @return \Illuminate\Support\Collection
     */
    public function scopeHasNoDescription($query) 
    {
        $query->where('description', null);
    }

    /**
     * Filters out specialties which have subjects
     *
     * @return \Illuminate\Support\Collection
     */
    public function scopeHasNoSubjects($query)
    {
        $query->doesntHave('subjects');
    }

    /**
     * Filters out specialties which have direction
     *
     * @return \Illuminate\Support\Collection
     */
    public function scopeHasNoDirection($query)
    {
        $query->whereHas('direction', function($q) {
            $q->where('title', 'Без направления');
        });
    }
}