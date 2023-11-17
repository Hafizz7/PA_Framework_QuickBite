<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class keranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjang';
    protected $fillable = ['nama','harga','jumlah','gambar','deskripsi', 'id_toko','id_user'];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class,'id_menu');
    }
    public function toko(): BelongsTo
    {
        return $this->belongsTo(Menu::class,'id_toko');
    }
    public function pembelis(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'id_user')->where('role', 'pembeli');
    }
}
