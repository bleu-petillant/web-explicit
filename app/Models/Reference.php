<?php

namespace App\Models;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reference extends Model
{
    use HasFactory;
    use Taggable;
    
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
