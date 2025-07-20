<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
 protected $fillable = [
    'nom_complet',
    'nom_entreprise',
    'type_activite',
    'email',
    'telephone',
    'description_activite',
    'password',
    'role',
    'status',
    'approved_at',
    'approval_notes'
];

// Méthodes d'état
public function isPending()
{
    return $this->status === 'pending' && $this->role === 'entrepreneur_en_attente';
}

public function isApproved()
{
    return $this->status === 'approved' && $this->role === 'entrepreneur_approuve';
}

public function isRejected()
{
    return $this->status === 'rejected';
}

// Méthodes de transition
public function approve(string $notes = null)
{
    $this->update([
        'role' => 'entrepreneur_approuve',
        'status' => 'approved',
        'approved_at' => now(),
        'approval_notes' => $notes
    ]);
}

public function reject(string $notes = null)
{
    $this->update([
        'status' => 'rejected',
        'approval_notes' => $notes
    ]);
}

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
