<?php

namespace App\Models;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    use Taggable;
    protected $guarded = ['created_at','updated_at'];

    protected $date = ['published_at'];


    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'course_user','course_id', 'user_id')->withPivot('activated','question_position','validate');
    }


    public function coursesinvalidate()
    {
        return $this->belongsToMany(User::class,'course_user')->wherePivot('validate','!=',1)->wherePivot('user_id',auth()->user()->id);
    }

    public function coursesnull()
    {
        return $this->belongsToMany(User::class,'course_user')->wherePivot('validate','=',null)->wherePivot('user_id',auth()->user()->id);
    }


    public function coursesvalidate()
    {
        return $this->belongsToMany(User::class,'course_user')->wherePivot('validate','=',1)->wherePivot('user_id',auth()->user()->id);
    }
    public function activated()
    {
        return $this->belongsToMany(User::class,'course_user')->wherePivot('activated',1)->wherePivot('user_id',auth()->user()->id);
    }

    public function unactivated()
    {
        return $this->belongsToMany(User::class,'course_user')->wherePivot('activated',0)->wherePivot('user_id',auth()->user()->id);
    }
    

    public function references()
    {
        return $this->belongsToMany(Reference::class,'course_reference','course_id','reference_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }




}
