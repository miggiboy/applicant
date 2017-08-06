<?php

namespace App\Models\Profession;

use App\Models\Model;

use App\Models\Specialty\Specialty;

class Profession extends Model
{
    /**
     * Filters out professions which title
     * is not like the given query parameter
     *
     * @param  $query
     * @param  string $input
     * @return \Illuminate\Support\Collection
     */
    public function scopeLike($query, $input)
    {
        return $query->where('title', 'like', "%{$input}%");
    }

    /**
     * Includes professions which (don't) have description
     *
     * @return \Illuminate\Support\Collection
     */
    public function scopeHasDescription($query, $has = true)
    {
        return $query->where('full_description', ((bool) $has ? '!=' : '='), null);
    }

    /**
     * Filters out professions which don't belong to the given direction
     *
     * @param  $query
     * @param  integer $direction
     * @return \Illuminate\Support\Collection
     */
    public function scopeOf($query, $category)
    {
        return $query->where('category_id', is_object($category) ? $category->id : $category );
    }

    public function category()
    {
        return $this->belongsTo(ProfessionCategories::class, 'category_id');
    }

    public function specialties()
    {
        return $this->belongsToMany(Specialty::class)->select(['id', 'slug', 'title', 'code']);
    }
}
