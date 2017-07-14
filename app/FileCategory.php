<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileCategory extends Model
{
    protected $guarded = [];
    public function files()
    {
        return $this->hasMany(File::class);
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_file_category');
    }
}