<?php
namespace App\Models\University;
use Illuminate\Database\Eloquent\Model;
class ReceptionCommittee extends Model
{
    protected $guarded = [];
    public function university()
    {
        return $this->belongsTo(University::class);
    }
}