<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPenerima;
use App\Models\pengembalian;

class PengembalianController extends Controller
{
    public function store(Request $request, $id)
    {
        // Cari data penerimaan berdasarkan ID
        $data_penerima = DataPenerima::findOrFail($id);

        // Validasi status
        if ($data_penerima->status === 'Dikembalikan') {
            return redirect()->back()->with('error', 'Barang sudah dikembalikan sebelumnya.');
        }

        // Simpan data ke tabel pengembalian
        $pengembalian = new Pengembalian();
        $pengembalian->nama_pegawai = $penerimaan->nama_pegawai;
        $pengembalian->NIP = $data_penerima->NIP;
        $pengembalian->jabatan = $data_penerima->jabatan;
        $pengembalian->type_barang = $data_penerima->type_barang;
        $pengembalian->jenis_barang = $data_penerima->merk_barang;
        $pengembalian->jumlah_barang = $data_penerima->kelengkapan_barang;
        $pengembalian->tanggal_penerimaan = $data_penerima->tanggal_penerimaan;
        $pengembalian->save();

        // Update status dan tanggal pengembalian di tabel penerimaan
        $data_penerima->status = 'Dikembalikan';
        $data_penerima->tanggal = $request->tanggal;
        $data_penerima->save();
        return redirect()->back()->with('success', 'Barang berhasil dikembalikan.');
    }
}
