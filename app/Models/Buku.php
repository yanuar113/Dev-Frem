<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Buku extends Model
{
    
    
        use HasFactory;

        protected $table = 'bukus';

        public function rakBuku(): BelongsTo{
            return $this->belongsTo(RakBuku::class, 'id_rak_buku');
        }
       
    
}
