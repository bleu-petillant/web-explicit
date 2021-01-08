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
        return $this->belongsToMany(User::class,'course_user','course_id', 'user_id')->wherePivot('user_id',auth()->user()->id)->withPivot('activated','question_position','validate');
    }

    public function usersnull()
    {
         return $this->belongsToMany(User::class,'course_user')->withPivot('activated','question_position','validate');
    }

    public function coursesactive()
    {
        return $this->belongsToMany(User::class,'course_user','course_id', 'user_id')->wherePivot('user_id',auth()->user()->id)->wherePivot('activated','=',1);
    }


    public function coursesvalidate()
    {
        return $this->belongsToMany(User::class,'course_user')->wherePivot('validate','=',1)->wherePivot('activated','=',1)->wherePivot('user_id',auth()->user()->id);
    }
    public function coursesUnvalidate()
    {
        return $this->belongsToMany(User::class,'course_user')->wherePivot('validate','=',0)->wherePivot('user_id',auth()->user()->id);
    }
    public function activated()
    {
        return $this->belongsToMany(User::class,'course_user')->wherePivot('activated','=',1)->wherePivot('validate','=',0)->wherePivot('user_id',auth()->user()->id);
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
