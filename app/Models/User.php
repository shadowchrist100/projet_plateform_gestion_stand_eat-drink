<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $nom_complet
 * @property string $nom_entreprise
 * @property string $type_activite
 * @property string $email
 * @property string|null $telephone
 * @property string $description_activite
 * @property string $password
 * @property string $role
 * @property string $status
 * @property Carbon|null $approved_at
 * @property string|null $approval_notes
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Produit> $produits
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public const ROLE_ADMIN = 'admin';
    public const ROLE_ENTREPRENEUR_PENDING = 'entrepreneur_en_attente';
    public const ROLE_ENTREPRENEUR_APPROVED = 'entrepreneur_approuve';

    public const STATUS_PENDING = 'pending';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
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
            'approved_at' => 'datetime',
        ];
    }

    /**
     * Relation avec les produits de l'exposant
     */
    public function produits()
    {
        return $this->hasMany(Produit::class, 'stand_id');
    }

    // ==================== Méthodes d'état ====================

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isPendingEntrepreneur(): bool
    {
        return $this->role === self::ROLE_ENTREPRENEUR_PENDING 
            && $this->status === self::STATUS_PENDING;
    }

    public function isApprovedEntrepreneur(): bool
    {
        return $this->role === self::ROLE_ENTREPRENEUR_APPROVED 
            && $this->status === self::STATUS_APPROVED;
    }

    public function isRejectedEntrepreneur(): bool
    {
        return $this->status === self::STATUS_REJECTED;
    }

    // ==================== Méthodes de transition ====================

    /**
     * Approuve l'entrepreneur
     */
    public function approve(string $notes = null): void
    {
        $this->update([
            'role' => self::ROLE_ENTREPRENEUR_APPROVED,
            'status' => self::STATUS_APPROVED,
            'approved_at' => now(),
            'approval_notes' => $notes
        ]);
    }

    /**
     * Rejette la demande de l'entrepreneur
     */
    public function reject(string $notes = null): void
    {
        $this->update([
            'status' => self::STATUS_REJECTED,
            'approval_notes' => $notes
        ]);
    }

    /**
     * Remet en attente la demande de l'entrepreneur
     */
    public function pend(): void
    {
        $this->update([
            'role' => self::ROLE_ENTREPRENEUR_PENDING,
            'status' => self::STATUS_PENDING,
            'approved_at' => null,
        ]);
    }

    // ==================== Scopes ====================

    /**
     * Scope pour les administrateurs
     */
    public function scopeAdmins($query)
    {
        return $query->where('role', self::ROLE_ADMIN);
    }

    /**
     * Scope pour les entrepreneurs approuvés
     */
    public function scopeApprovedEntrepreneurs($query)
    {
        return $query->where('role', self::ROLE_ENTREPRENEUR_APPROVED)
                    ->where('status', self::STATUS_APPROVED);
    }

    /**
     * Scope pour les entrepreneurs en attente
     */
    public function scopePendingEntrepreneurs($query)
    {
        return $query->where('role', self::ROLE_ENTREPRENEUR_PENDING)
                    ->where('status', self::STATUS_PENDING);
    }

    /**
     * Scope pour les entrepreneurs rejetés
     */
    public function scopeRejectedEntrepreneurs($query)
    {
        return $query->where('status', self::STATUS_REJECTED);
    }

    // ==================== Méthodes utilitaires ====================

    /**
     * Vérifie si l'utilisateur peut gérer un stand
     */
    public function canManageStand(): bool
    {
        return $this->isApprovedEntrepreneur();
    }

    /**
     * Vérifie si l'utilisateur peut être affiché comme exposant
     */
    public function canBeListedAsExposant(): bool
    {
        return $this->isApprovedEntrepreneur();
    }
}