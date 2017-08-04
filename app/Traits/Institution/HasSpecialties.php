<?php

namespace App\Traits\Institution;

use Illuminate\Http\Request;

use App\Models\Specialty\Specialty;

trait HasSpecialties
{
    /**
     * Determine if this insitution has specialty at a given study form
     *
     * @param  mixed $specialty
     * @param  string $studyForm
     * @return boolean
     */
    public function hasSpecialty($specialty, $studyForm)
    {
        return (bool) $this->specialties()
            ->wherePivot('specialty_id', get_id($specialty))
            ->wherePivot('form', $studyForm)
            ->count();
    }

    public function hasSpecialtyAtForm($specialty, $studyForm)
    {
        return (bool) $this->specialties()
            ->wherePivot('specialty_id', get_id($specialty))
            ->wherePivot('form', $studyForm)
            ->count();
    }

    public function qualifications()
    {
        return $this
            ->belongsToMany(Specialty::class)
            ->where('type', 'qualification')
            ->withPivot('study_price', 'study_period', 'form');
    }

    public function specialties()
    {
        return $this->belongsToMany(Specialty::class)
            ->withPivot('study_price', 'study_period', 'form');
    }

    public function specialties_distinct()
    {
        return $this->belongsToMany(Specialty::class)
            ->where('type', 'specialty')
            ->groupBy('specialty_id');
    }
}
