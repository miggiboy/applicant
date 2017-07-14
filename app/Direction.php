<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Direction extends Model
{

    public function specialities()
    {
        return $this->hasMany(Speciality::class);
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = ['title'];

    public function getUniversityDirections()
    {
    	return $this->where('institution', 1);
    }

    public function getCollegeDirections()
    {
    	return $this->where('institution', 0);
    }
}