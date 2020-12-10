<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function reponses()
    {
        return $this->belongsToMany(Reponse::class);
    }
    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
