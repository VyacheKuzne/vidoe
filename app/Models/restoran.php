<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class restoran extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'tittle',
        'description',
        'category',
        'file_video',
        'file_poster',
    ];
    
}
