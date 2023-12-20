<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMitra;
use App\Models\DataMitraPengembalian;
use Illuminate\Support\Facades\Session;
use PDF;
use DataTables;

class DataMitraController extends Controller
{
    public function index()
    {
        $data_mitra = DataMitra::orderBy('id', 'asc')->get();
        $jumlah_data = $data_mitra->count();
        $no = 0;
        return view('data_mitra.index', compact('data_mitra', 'no', 'jumlah_data'));
    }

    public function create()
    {
        return view('data_mitra.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_barang' => 'required|string',
            'mitra_pengirim' => 'required|string',
            'kelengkapan_barang' => 'required|string',
            'tanggal_penerimaan' => 'required|date',
            'yang_menerima' => 'required|string',
        ]);

        $data_mitra = new DataMitra;
        $data_mitra->mitra_pengirim = $request->mitra_pengirim;
        $data_mitra->jenis_barang = $request->jenis_barang;
        $data_mitra->merk_barang = $request->merk_barang;
        $data_mitra->type_barang = $request->type_barang; // Mengganti urutan field
        $data_mitra->jumlah_barang = $request->jumlah_barang;
        $data_mitra->serial_number = $request->serial_number;
        $data_mitra->kelengkapan_barang = $request->kelengkapan_barang;
        $data_mitra->tanggal_penerimaan = $request->tanggal_penerimaan;
        $data_mitra->yang_menerima = $request->yang_menerima;
        $data_mitra->status = $request->status;
        $data_mitra->save();

        Session::flash('flash_type', 'store');
        Session::flash('flash_message', 'Data berhasil disimpan');
        return redirect('data_mitra')->with(['flash_message' => 'Data Berhasil Disimpan', 'flash_color' => 'success']);
    }

    public function edit($id)
    {
        $data_mitra = DataMitra::find($id);
        return view('data_mitra.edit', compact('data_mitra'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jenis_barang' => 'required|string',
            'mitra_pengirim' => 'required|string',
            'kelengkapan_barang' => 'required|string',
            'tanggal_penerimaan' => 'required|date',
            'yang_menerima' => 'required|string',
        ]);
    
        $data_mitra = DataMitra::find($id);
    
        if (!$data_mitra) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
    
        // Menyimpan data setelah validasi
        $data_mitra->mitra_pengirim = $request->mitra_pengirim;
        $data_mitra->jenis_barang = $request->jenis_barang;
        $data_mitra->merk_barang = $request->merk_barang;
        $data_mitra->type_barang = $request->type_barang;
        $data_mitra->jumlah_barang = $request->jumlah_barang;
        $data_mitra->serial_number = $request->serial_number;
        $data_mitra->kelengkapan_barang = $request->kelengkapan_barang;
        $data_mitra->tanggal_penerimaan = $request->tanggal_penerimaan;
        $data_mitra->tanggal_pengembalian = $request->tanggal_pengembalian;
        $data_mitra->yang_menerima = $request->yang_menerima;
        $data_mitra->status = $request->status;
         // Jika status DIKEMBALIKAN, pindahkan data ke DataPengembalian
         if ($request->status === 'DIKEMBALIKAN') {
            $data_mitrapengembalian = new DataMitraPengembalian();
            $data_mitrapengembalian->mitra_pengirim = $data_mitra->mitra_pengirim;
            $data_mitrapengembalian->jenis_barang = $data_mitra->jenis_barang;
            $data_mitrapengembalian->merk_barang = $data_mitra->merk_barang;
            $data_mitrapengembalian->type_barang = $data_mitra->type_barang;
            $data_mitrapengembalian->jumlah_barang = $data_mitra->jumlah_barang;
            $data_mitrapengembalian->serial_number = $data_mitra->serial_number;
            $data_mitrapengembalian->kelengkapan_barang = $data_mitra->kelengkapan_barang;
            $data_mitrapengembalian->tanggal_pengembalian = $data_mitra->tanggal_pengembalian;
            $data_mitrapengembalian->yang_menerima = $data_mitra->yang_menerima;
            $data_mitrapengembalian->status = $data_mitra->status;
        
            $data_mitrapengembalian->save();
            
            // Opsional: Hapus data dari DataPenerimas jika dibutuhkan
            $data_mitra->delete();
        }
        
        // Redirect setelah operasi penyimpanan dilakukan
        return redirect()->route('data_mitrapengembalian.index')->with('success', 'Status berhasil diperbarui!');
        $data_mitra->save();
    
        // Menampilkan pesan kesuksesan
        return redirect('data_mitra')->with([
            'flash_message' => 'Data Berhasil Di Update',
            'flash_color' => 'info'
        ]);
    }    

    public function destroy($id)
    {
        $data_mitra = DataMitra::find($id);
        $data_mitra->delete();
        return redirect('data_mitra')->with(['flash_message' => 'Data Berhasil Dihapus', 'flash_color' => 'danger']);
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->kata;

        $data_mitra = DataMitra::where('jenis_barang', 'like', '%' . $cari . '%')
            ->orWhere('type_barang', 'like', '%' . $cari . '%')
            ->paginate($batas);

        $no = $batas * ($data_mitra->currentPage() - 1);

        return view('data_mitra.search', compact('data_mitra', 'cari', 'no'));
    }

    public function data_mitra_tabelpdf() {
        $data_mitra = DataMitra::all();
        $pdf = PDF::loadView('data_mitra.data_mitra_tabelpdf', ['data_mitra' => $data_mitra])
            ->setPaper('A4', 'landscape');
        return $pdf->stream('laporan.pdf');
    }
}
