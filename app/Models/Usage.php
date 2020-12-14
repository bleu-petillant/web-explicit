<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','updated_at'];
    protected $date = ['published_at'];

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }
}
