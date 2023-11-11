<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Toko extends Model
{
    use HasFactory;
    protected $table = 'tokos';
    protected $fillable = ['nama_toko','deskripsi_toko','gambar', 'id_user'];

    public function menu(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class, 'id_toko');
    }

    public function penjual(): HasOne
    {
        return $this->hasOne(User::class, 'id_user')->where('role', 'penjual');
    }

    public function pembelis(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'id_user')->where('role', 'pembeli');
    }


}
