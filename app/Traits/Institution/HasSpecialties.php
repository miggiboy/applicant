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

    public function getSpecialtiesByQualifications()
    {
        // Get institution qualifications
        $qualifications = $this->qualifications()
            ->with('specialty')
            ->get();

        dump($qualifications);

        // Group them by specialties

        $specialties = collect($this->specialties_distinct()->get());

        foreach ($qualifications as $qualification) {
            if (! $specialties->contains($qualification->specialty)) {
                $specialties->push($qualification->specialty);
            }
        }

        dump($specialties->filter());

        // return collection of specialties with attached qualifications
        return $specialties;
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
        return $this->belongsToMany(Specialty::class)->withPivot('study_price', 'study_period', 'form');
    }

    public function specialties_distinct()
    {
        return $this->belongsToMany(Specialty::class)->groupBy('specialty_id');
    }
}
