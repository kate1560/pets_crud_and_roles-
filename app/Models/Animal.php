<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
        'user_id', // MUY IMPORTANTE
    ];

    protected $casts = [
        'is_vaccinated' => 'boolean',
        'age' => 'integer',
        'weight' => 'decimal:2',
    ];

    public const SPECIES = [
        'Dog' => 'Dog',
        'Cat' => 'Cat',
        'Bird' => 'Bird',
        'Fish' => 'Fish',
        'Reptile' => 'Reptile',
        'Other' => 'Other',
    ];

    // Relación: un animal pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
