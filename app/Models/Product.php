<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code', 
        'harga',
        'qty'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'qty' => 'integer'
    ];
}