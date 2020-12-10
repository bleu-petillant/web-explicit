<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','updated_at'];
    protected $date = ['published_at'];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function teacher()
    {
        return $this->belongsTo(User::class);
    }
}
