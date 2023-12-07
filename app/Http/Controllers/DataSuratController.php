<?php

namespace App\Http\Controllers;
use App\Http\Controllers\DataPenerimas;
use Illuminate\Http\Request; // Diperbaiki: Menggunakan model 'DataPenerima'

class DataSuratController extends Controller
{
    public function index($id)
    {
        $data_penerimas = DataPenerimas::find($id);

        if (!$data_penerimas) {
            // Jika data tidak ditemukan, Anda dapat menangani kasus ini sesuai kebutuhan
            return response()->json(['message' => 'Data Penerima tidak ditemukan'], 404);
        }

        $nama_pegawai = $data_penerimas->nama_pegawai; // Sesuaikan dengan field yang dimiliki oleh model 'DataPenerima'
        $jabatan = $data_penerimas->jabatan; // Sesuaikan dengan field yang dimiliki oleh model 'DataPenerima'
        $type_barang = $data_penerimas->type_barang; // Sesuaikan dengan field yang dimiliki oleh model 'DataPenerima'

        $pdf = \PDF::loadView('index', compact('nama_pegawai', 'jabatan', 'type_barang'));

        return $pdf->stream($data_penerimas->surat_berita_cara . '.pdf');
    }
}
