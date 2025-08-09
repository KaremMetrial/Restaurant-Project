<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'short_description',
        'icon',
        'status',
    ];
    protected $casts = [
        'status' => 'boolean',
    ];
}
