<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produit extends Model
{
<<<<<<< HEAD
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
=======
    protected $fillable = ['nom', 'description', 'prix', 'user_id'];
}
>>>>>>> 6c352c589d551d335b27734674aabc02469f6d26
