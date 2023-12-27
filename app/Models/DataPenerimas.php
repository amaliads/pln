<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenerimas extends Model
{
    use HasFactory;

    protected $table = 'data_penerimas';

    public function data_pengembalian()
    {
        return $this->hasOne(DataPengembalian::class, 'data_penerimas_id');
    }

    public function data_pegawai()
    {
        return $this->belongsTo(DataPegawai::class, 'id_pegawai_id');
    }

    //public function data_surat()
    //{
   //     return this->hasOne()
   // }
}
