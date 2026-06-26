<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // Pastikan 'image' ada di dalam array ini
    protected $fillable = ['title', 'content', 'image'];
}