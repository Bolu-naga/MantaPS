<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    // HANYA SISAKAN INI
    protected $fillable = ['title', 'cover_image', 'is_featured'];
}