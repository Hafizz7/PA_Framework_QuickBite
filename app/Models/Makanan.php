<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Makanan extends Model
{
    use HasFactory;
    protected $table = 'makanans';
    protected $fillable = ['nama','harga','stock','gambar','id_menu', 'id_toko', 'deskripsi'];
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class,'id_menu');
    }
    public function toko(): BelongsTo
    {
        return $this->belongsTo(Menu::class,'id_toko');
    }
}
