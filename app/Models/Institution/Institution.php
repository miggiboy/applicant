<?php

namespace App\Models\Institution;

use App\Models\Model;

use App\Traits\Institution\{
    HasSpecialties,
    Searchable
};

use Spatie\MediaLibrary\HasMedia\{
    Interfaces\HasMediaConversions
};

use Spatie\MediaLibrary\{
    HasMedia\HasMediaTrait
};

use Illuminate\Http\Request;

class Institution extends Model implements HasMediaConversions
{
    /**
     * Package traits
     */
    use HasMediaTrait;

    /**
     * Custom traits
     */
    use Searchable;
    use HasSpecialties;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'has_dormitory'     => 'boolean',
        'has_military_dep'  => 'boolean',
        'is_paid'           => 'boolean',
    ];

    const TYPES = [
        'college',
        'university',
    ];

    public function typeIs($type)
    {
        return strcmp($this->type, $type) === 0;
    }

    /**
     * Retrieves institutions of $type type
     *
     * @param  Builder $query
     * @param  string $institutionType
     * @return Builder
     */
    public function scopeOfType($query, $institutionType)
    {
        return $query->where('type', str_singular($institutionType));
    }

    public function getBaseUrl()
    {
        $exceptions = ['vk.com'];

        if (str_contains($this->web_site_url, $exceptions)) {
            return $this->web_site_url;
        }

        return parse_url($this->web_site_url)['host'] ?? $this->web_site_url;
    }

    /**
     * Always returns web_site_url attribute with http(s)
     *
     * @param  String $value
     * @return String
     */
    public function getWebSiteUrlAttribute($value)
    {
        return $value ? $this->formatUrl($value) : null;
    }

    public function addressQuery()
    {
        return 'Казахстан, ' . $this->city->title . ', ' . ($this->address ?: $this->title);
    }

    /**
     * Checks if this institution has reception committee
     *
     * @return boolean
     */
    public function hasReception()
    {
        return (bool) $this->reception()->count();
    }

    public static function hasType($type)
    {
        return in_array(str_singular($type), self::TYPES);
    }

    public static function doesntHaveType($type)
    {
        return ! static::hasType($type);
    }

    protected function formatUrl($url)
    {
        if (! preg_match('/^http(s)?:\/\//', $url)) {
            return "http://{$url}";
        }

        return $url;
    }

    public function logo()
    {
        return $this->getMedia('logo')->first();
    }

    public function hasLogo()
    {
        return $this->logo() !== null;
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
        return $this->belongsTo(\App\Models\City\City::class);
    }

    public function reception()
    {
        return $this->hasOne(ReceptionCommittee::class);
    }

    public function map()
    {
        return $this->hasOne(Map::class, 'institution_id');
    }
}
