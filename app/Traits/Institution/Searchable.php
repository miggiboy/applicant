<?php

namespace App\Traits\Institution;

trait Searchable
{
    /**
     * Includes institutions which title or abbreviation
     * is like the given query parameter
     *
     * @param  $query
     * @param  string $input
     * @return \Illuminate\Support\Collection
     */
    public function scopeLike($query, $input)
    {
        return $query
            ->where('title', 'like', "%{$input}%")
            ->orWhere('abbreviation', 'like', "%{$input}%");
    }

    /**
     * Includes institutions which belong to the city
     *
     * @param  $query
     * @param  string $queryString
     * @return \Illuminate\Support\Collection
     */
    public function scopeIn($query, $city)
    {
        return $query->where('city_id', $city);
    }

    public function scopeWithSpecialty($query, $specialty)
    {
        return $query
            ->whereHas('specialties', function ($q) use ($specialty) {
                return $q->where('id', $specialty);
            });
    }
}
