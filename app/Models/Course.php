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

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }
    
    public function references()
    {
        return $this->belongsTo(Reference::class);
    }

}
