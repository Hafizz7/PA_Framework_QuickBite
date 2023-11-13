<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['username', 'email', 'role', 'password'];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function alamats(): BelongsTo
    {
        return $this->belongsTo(Alamat::class);
    }

    public function penjual(): HasOne
    {
        return $this->hasOne(Toko::class, 'id_user')->where('role', 'penjual');
    }

    public function pembelis(): BelongsToMany
    {
        return $this->belongsToMany(Toko::class, 'id_user')->where('role', 'pembeli');
    }
    public function hasRole($role)
    {
        return $this->role == $role;
    }
}
