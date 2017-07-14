<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Subject extends Model
{
    protected $fillable = ['title'];
    /*
    |--------------------------------------------------------------------------
    | Relations with other tables
    |--------------------------------------------------------------------------
    |
    */
    
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    
    public function getSpecialties()
    {
        $subject = $this;
        
        if ($this->parent_id) {
            $subject = static::find($this->parent_id);
        }
        
        return $subject->specialities;
    }
    
    public function specialities()
    {
        return $this->belongsToMany(Speciality::class);
    }
    public function files()
    {
        return $this->morphMany('App\File', 'fileable');
    }
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
    public function fileCategories()
    {
        return $this->belongsToMany(FileCategory::class, 'subject_file_category');
    }
}
