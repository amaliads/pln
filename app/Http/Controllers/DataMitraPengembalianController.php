<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMitraPengembalian;
use Illuminate\Support\Facades\Session;
use PDF;

class DataMitraPengembalianController extends Controller
{
    public function index()
    {
        $data_mitrapengembalian = DataMitraPengembalian::orderBy('id', 'asc')->paginate(10);
        $jumlah_data = $data_mitrapengembalian->count();
        $no = ($data_mitrapengembalian->currentPage() - 1) * $data_mitrapengembalian->perPage();
    
        return view('data_mitrapengembalian.index', compact('data_mitrapengembalian', 'no', 'jumlah_data'));
    }
    

    public function create()
    {
        return view('data_mitrapengembalian.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_barang' => 'required|string',
            'mitra_pengirim' => 'required|string',
            'kelengkapan_barang' => 'required|string',
            'tanggal_pengembalian' => 'required|date',
            'yang_menerima' => 'required|string',
        ]);

        $data_mitrapengembalian = new DataMitra;
        $data_mitrapengembalian->mitra_pengirim = $request->mitra_pengirim;
        $data_mitrapengembalian->jenis_barang = $request->jenis_barang;
        $data_mitrapengembalian->merk_barang = $request->merk_barang;
        $data_mitrapengembalian->type_barang = $request->type_barang; // Mengganti urutan field
        $data_mitrapengembalian->jumlah_barang = $request->jumlah_barang;
        $data_mitrapengembalian->serial_number = $request->serial_number;
        $data_mitrapengembalian->kelengkapan_barang = $request->kelengkapan_barang;
        $data_mitrapengembalian->tanggal_pengembalian = $request->tanggal_pengembalian;
        $data_mitrapengembalian->yang_menerima = $request->yang_menerima;
        $data_mitra->status = $request->status;
        $data_mitra->save();

        Session::flash('flash_type', 'store');
        Session::flash('flash_message', 'Data berhasil disimpan');
        return redirect('data_mitrapengembalian')->with(['flash_message' => 'Data Berhasil Disimpan', 'flash_color' => 'success']);
    }

    public function edit($id)
    {
        $data_mitrapengembalian = DataMitraPengembalian::find($id);
        return view('data_mitrapengembalian.edit', compact('data_mitrapengembalian'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jenis_barang' => 'required|string',
            'mitra_pengirim' => 'required|string',
            'kelengkapan_barang' => 'required|string',
            'tanggal_pengembalian' => 'required|date',
            'yang_menerima' => 'required|string',
        ]);
    
        $data_mitrapengembalian = DataMitraPengembalian::find($id);
    
        if (!$data_mitrapengembalian) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
    
        // Menyimpan data setelah validasi
        $data_mitrapengembalian->mitra_pengirim = $request->mitra_pengirim;
        $data_mitrapengembalian->jenis_barang = $request->jenis_barang;
        $data_mitrapengembalian->merk_barang = $request->merk_barang;
        $data_mitrapengembalian->type_barang = $request->type_barang;
        $data_mitrapengembalian->jumlah_barang = $request->jumlah_barang;
        $data_mitrapengembalian->serial_number = $request->serial_number;
        $data_mitrapengembalian->kelengkapan_barang = $request->kelengkapan_barang;
        $data_mitrapengembalian->tanggal_pengembalian = $request->tanggal_pengembalian;
        $data_mitrapengembalian->yang_menerima = $request->yang_menerima;
        $data_mitrapengembalian->status = $request->status;
        $data_mitrapengembalian->save();
        
        // Redirect setelah operasi penyimpanan dilakukan
        return redirect()->route('data_mitrapengembalian.index')->with('success', 'Status berhasil diperbarui!');
        $data_mitrapengembalian->save();
    
        // Menampilkan pesan kesuksesan
        return redirect('data_mitrapengembalian')->with([
            'flash_message' => 'Data Berhasil Di Update',
            'flash_color' => 'info'
        ]);
    }    

    public function destroy($id)
    {
        $data_mitrapengembalian = DataMitraPengembalian::find($id);
        $data_mitrapengembalian->delete();
        return redirect('data_mitrapengembalian')->with(['flash_message' => 'Data Berhasil Dihapus', 'flash_color' => 'danger']);
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->kata;

        $data_mitrapengembalian = DataMitraPengembalian::where('jenis_barang', 'like', '%' . $cari . '%')
            ->orWhere('type_barang', 'like', '%' . $cari . '%')
            ->paginate($batas);

        $no = $batas * ($data_mitrapengembalian->currentPage() - 1);

        return view('data_mitrapengembalian.search', compact('data_mitrapengembalian', 'cari', 'no'));
    }


    public function data_mitrapengembalian_tabel() {
        $data_mitrapengembalian = DataMitraPengembalian::all();
        $pdf = PDF::loadView('data_mitrapengembalian.data_mitra_tabel', ['data_mitrapengembalian' => $data_mitrapengembalian])
            ->setPaper('A4', 'landscape');
        return $pdf->stream('laporan.pdf');
    }
}

