<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfDirection extends Model
{
    /**
     * The model is mass assignable
     * 
     * @var array
     */
    protected $guarded = [];

    /*
    |--------------------------------------------------------------------------
    | Relations with other tables
    |--------------------------------------------------------------------------
    |
    */
   
    public function professions()
    {
        return $this->hasMany(Profession::class);
    }
}
