<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // tambahin ini kalau belum
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // ===================== RELASI =====================

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function adminProfile()
    {
        // pakai nama "adminProfile" biar nggak tabrakan dengan nama class Admin (PHP)
        return $this->hasOne(Admin::class);
    }
}
