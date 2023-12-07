<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataMitra;
use App\Http\Controllers\DataMitraPengembalianController;
use App\Http\Controllers\DataMitraController;

class DataMitraPengembalian extends Model
{
    use HasFactory;

    protected $table = 'data_mitrapengembalian';

    protected $fillable = [
    'mitra_pengirim',
    'type_barang',
    'jenis_barang',
    'merk_barang',
    'serial_number',
    'jumlah_barang',
    'kelengkapan_barang',
    'tanggal_pengembalian',
    'yang_menerima',
    'status',
    ];

    public function DataMitra()
    {
        return $this->belongsTo(DataMitra::class, 'data_mitra_id');
    }
}
