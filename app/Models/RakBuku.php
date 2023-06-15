<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RakBuku extends Model
{
    // use HasFactory;
    protected $table = 'rak_bukus';
    public function buku() : HasMany
    {
        return $this->hasMany(Buku::class,'id_rak_buku','id');
    }
}
