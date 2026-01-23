<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'species',
        'breed',
        'age',
        'weight',
        'color',
        'is_vaccinated',
        'notes',
    ];

    protected $casts = [
        'is_vaccinated' => 'boolean',
        'age' => 'integer',
        'weight' => 'decimal:2',
    ];

    public const SPECIES = ['Dog', 'Cat', 'Bird', 'Fish', 'Reptile', 'Other'];
}
