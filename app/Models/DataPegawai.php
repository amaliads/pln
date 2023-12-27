<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPegawai extends Model
{
    use HasFactory;
    protected $table = 'data_pegawai';

    public function data_penerimas()
{
    return $this->hasMany(DataPenerimas::class, 'id_pegawai_id');
}
}

