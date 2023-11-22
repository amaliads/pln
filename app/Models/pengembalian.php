<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Pengembalian extends Model
{
    public function penerimaan() {
        return $this->belongsTo(Penerimaan::class, 'penerimaan_id');
    }
}


