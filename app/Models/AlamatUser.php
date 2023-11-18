<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AlamatUser extends Model
{
    use HasFactory;
    protected $table = 'alamat_users';
    protected $fillable = ['alamat','id_user'];

    public function pembelis(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'id_user')->where('role', 'pembeli');
    }
}
