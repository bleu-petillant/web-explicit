<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    public function questions()
    {
       return $this->belongsToMany(Question::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
