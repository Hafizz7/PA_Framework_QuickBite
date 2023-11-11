<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alamat extends Model
{
    use HasFactory;
    protected $table = 'alamats';
    protected $fillable = ['kabupaten','kota','jalan','id_user'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
