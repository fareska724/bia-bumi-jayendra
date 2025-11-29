<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fleet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'size',
        'price_per_km',
        'capacity_m3',
        'description',
    ];
}
