<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'category',
        'image',
        'status',
        'checkbox'
    ];

    protected $casts = [
        'checkbox'=> 'array',
        ];
}
