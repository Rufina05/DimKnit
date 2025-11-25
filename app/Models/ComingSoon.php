<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComingSoon extends Model
{
    protected $table = 'coming_soon';
    
    protected $fillable = [
        "coming_image"
    ];
}
