<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'active' => 'boolean',
        ];
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function personalFiles()
    {
        return $this->hasMany(BerkasPribadi::class, 'user_id');
    }

    public function activities()
    {
        return $this->hasMany(AktivitasBerkas::class, 'user_id');
    }

    public function sharedFiles()
    {
        return $this->hasMany(BerbagiBerkas::class, 'shared_by');
    }

    public function receivedFiles()
    {
        return $this->hasMany(BerbagiBerkas::class, 'shared_to');
    }

    public function scopeAdmin($query)
    {
        return $query->where('role', 'admin');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
