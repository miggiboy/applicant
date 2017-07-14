<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
class Profession extends Model
{
    protected $dates = ['deleted_at'];
    /**
     * The model is mass assignable
     * 
     * @var array
     */
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
    
    
    /*
    |--------------------------------------------------------------------------
    | Relations with other tables
    |--------------------------------------------------------------------------
    |
    */
   
    public function profDirection() 
    {
        return $this->belongsTo(ProfDirection::class);
    }
    public function specialities() 
    {
        return $this->belongsToMany(Speciality::class)
            ->select(['id', 'slug', 'title', 'code'])
            ->orderBy('title');
    }
    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    |
    */
    
    /**
     * Returns string with 
     * 
     * @param  integer $quantity
     * @return string
     */
    public static function getGrammaticallyCorrectCount($quantity) 
    {
        if ($quantity == 0) {
            return 'Профессий не найдено.';
        } elseif ($quantity >= 11 && $quantity <= 19) {
            return 'Найдено ' . $quantity . ' профессий.';
        } elseif ($quantity % 10 >= 5) {
            return 'Найдено ' . $quantity . ' профессий.';
        } elseif ($quantity % 10 >= 2) {
            return 'Найдено ' . $quantity . ' профессии.';
        } elseif ($quantity % 10 == 1) {
            return 'Найдена ' . $quantity . ' профессия.';
        } else {
            return 'Найдено ' . $quantity . ' профессий.';
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Search scopes
    |--------------------------------------------------------------------------
    |
    */
    
    /**
     * Filters out professions which title
     * is not like the given query parameter
     * 
     * @param  [type] $query
     * @param  string $queryString
     * @return \Illuminate\Support\Collection
     */
    public function scopeLike($query, $queryString)
    {
        $query->where('title', 'like', "%{$queryString}%");
    }
    
    /**
     * Filters out professions which don't belong to the given direction
     * 
     * @param  [type] $query
     * @param  integer $direction
     * @return \Illuminate\Support\Collection
     */
    public function scopeOfDirection($query, $direction)
    {
        $query->where('prof_direction_id', $direction);
    }
}