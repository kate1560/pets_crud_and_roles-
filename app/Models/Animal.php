<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    use HasFactory;

    public const SPECIES = [
        'Dog'     => 'Dog',
        'Cat'     => 'Cat',
        'Bird'    => 'Bird',
        'Reptile' => 'Reptile',
        'Fish'    => 'Fish',
        'Other'   => 'Other',
    ];

    protected $fillable = [
        'user_id',
        'name',
        'species',
        'breed',
        'age',
        'weight',
        'color',
        'is_vaccinated',
        'notes',
        'image_path',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
