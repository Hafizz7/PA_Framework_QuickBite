<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $fillable = ['nama_menu', 'id_toko'];
    protected $appends = ['total_makanan'];
    public function makanan2(): HasMany
    {
        return $this->hasMany(Makanan::class, 'id_menu');
    }
    public function getTotalMakananAttribute()
    {
        return $this->makanan2->count();
        // return $this-> makanan::count();
        // return view('penjual.menu', compact('total'));
    }
    public function toko(): BelongsToMany
    {
        return $this->belongsToMany(Toko::class, 'id_toko');
    }

}
