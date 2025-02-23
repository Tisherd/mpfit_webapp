<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const LIGHT = 'light';
    const FRAGILE = 'fragile';
    const HEAVY = 'heavy';

    protected $fillable = [
        'name',
    ];
}
