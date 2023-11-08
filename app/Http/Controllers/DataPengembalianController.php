<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPengembalian;
use Session;
use PDF;

class DataPengembalianController extends Controller
{
    public function index()
    {
        $data_pengembalian = DataPengembalian::orderBy('id', 'asc')->paginate(5);
        $jumlah_data = $data_pengembalian->count();
        $no = 0;
        return view('data_pengembalian.index', compact('data_pengembalian', 'no', 'jumlah_data'));
    }

    public function edit($id)
    {
        $data_pengembalian = DataPengembalian::find($id);
        return view('data_pengembalian.edit', compact('data_pengembalian'));
    }

    public function update(Request $request, $id)
    {
        $data_pengembalian = DataPengembalian::find($id);
        $data_pengembalian->nama_pegawai = $request->nama_pegawai;
        $data_pengembalian->NIP = $request->NIP;
        $data_pengembalian->jabatan = $request->jabatan;
        $data_pengembalian->type_barang = $request->type_barang;
        $data_pengembalian->jenis_barang = $request->jenis_barang;
        $data_pengembalian->merk_barang = $request->merk_barang;
        $data_pengembalian->jumlah_barang = $request->jumlah_barang;
        $data_pengembalian->serial_number = $request->serial_number;
        $data_pengembalian->kelengkapan_barang = $request->kelengkapan_barang;
        $data_pengembalian->tanggal_pengembalian = $request->tanggal_pengembalian;
        $data_pengembalian->save();

        Session::flash('flash_type', 'update');
        Session::flash('flash_message', 'Data Berhasil Di Update');
        return redirect('data_pengembalian')->with(['flash_message' => 'Data Berhasil Di Update', 'flash_color' => 'info']);
    }

    public function destroy($id)
    {
        $data_pengembalian = DataPengembalian::find($id);
        $data_pengembalian->delete();
        return redirect('data_pengembalian')->with(['flash_message' => 'Data Berhasil Dihapus', 'flash_color' => 'danger']);
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->kata;

        $data_pengembalian = DataPengembalian::where('nama_pegawai', 'like', '%' . $cari . '%')
            ->orWhere('NIP', 'like', '%' . $cari . '%')
            ->orWhere('jabatan', 'like', '%' . $cari . '%')
            ->paginate($batas);

        $no = $batas * ($data_pengembalian->currentPage() - 1);

        return view('data_pengembalian.search', compact('data_pengembalian', 'cari', 'no'));
    }

    public function data_pengembalian_pdf($id)
    {
        $data_pengembalian = DataPengembalian::find($id);

        if (!$data_pengembalian) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $pdf = PDF::loadView('data_pengembalian.data_pengembalian_pdf', ['data_pengembalian' => $data_pengembalian]);
        return $pdf->download('laporan.pdf');
    }
}
