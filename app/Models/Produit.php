<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produit extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'image_url',
        'stand_id'
    ];

    public function stand(): BelongsTo
    {
        return $this->belongsTo(User::class, 'stand_id');
    }
}