<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'idea_id',
        'url',
    ];
    public function idea() 
    {
        return $this->belongsTo(Idea::class);
    }
}


