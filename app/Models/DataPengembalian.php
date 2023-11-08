<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataPenerima; // Ubah namespace sesuai dengan model DataPenerima

use App\Http\Controllers\DataPengembalianController;

class DataPengembalian extends Model
{
    use HasFactory;

    protected $table = 'data_pengembalian';

    // Definisikan relasi dengan model DataPenerima
    public function dataPenerima()
    {
        return $this->belongsTo(DataPenerima::class, 'data_penerima_id'); // Sesuaikan nama kunci asing
        if ($data_penerima->isDirty('status') && $data_penerima->status == 'dikembalikan') {
            $pengembalianBarang = new PengembalianBarang;
            $pengembalianBarang->dataPenerima()->associate($data_penerima);
            $pengembalianBarang->save();
    }
}
}