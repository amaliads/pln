<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMitra extends Model
{
    use HasFactory;

    protected $table = 'data_mitra';

    public function data_mitrapengembalian(){
    return $this->hasOne(DataMitraPengembalian::class, 'data_mitra_id');
    }
}
