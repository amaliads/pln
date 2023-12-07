<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataPenerima; // Ubah namespace sesuai dengan model DataPenerima

use App\Http\Controllers\DataPengembalianController;
use App\Http\Controllers\DataPenerimasController;

class DataPengembalian extends Model
{
    use HasFactory;

    protected $table = 'data_pengembalian';

    protected $fillable = [
        'id',
        'nama_pegawai',
        'NIP',
        'jabatan',
        'type_barang',
        'jenis_barang',
        'merk_barang',
        'jumlah_barang',
        'serial_number',
        'kelengkapan_barang',
        'tanggal_pengembalian',
        'status',
    ];

    public function DataPenerimas()
    {
        return $this->belongsTo(DataPenerimas::class, 'data_penerimas_id');
    }
}