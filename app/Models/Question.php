<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','updated_at'];


    public function reponses()
    {
        return $this->hasMany(Reponse::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function reponsecorrect()
    {
        return  $this->belongsTo(Reponse::class,'id','correct');
    }
    public function references()
    {
        return $this->belongsToMany(Reference::class,'question_reference','question_id','reference_id');
    }
}
