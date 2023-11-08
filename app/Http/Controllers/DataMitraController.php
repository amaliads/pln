<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMitra;
use Illuminate\Support\Facades\Session;
use PDF;

class DataMitraController extends Controller
{
    public function index()
    {
        $data_mitra = DataMitra::orderBy('id', 'asc')->paginate(5);
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
        $data_mitra = DataMitra::find($id);
        $data_mitra->mitra_pengirim = $request->mitra_pengirim;
        $data_mitra->jenis_barang = $request->jenis_barang;
        $data_mitra->merk_barang = $request->merk_barang;
        $data_mitra->type_barang = $request->type_barang; // Mengganti urutan field
        $data_mitra->jumlah_barang = $request->jumlah_barang;
        $data_mitra->serial_number = $request->serial_number;
        $data_mitra->kelengkapan_barang = $request->kelengkapan_barang;
        $data_mitra->tanggal_penerimaan = $request->tanggal_penerimaan;
        $data_mitra->yang_menerima = $request->yang_menerima;
        $data_mitra->save();

        Session::flash('flash_type', 'update');
        Session::flash('flash_message', 'Data Berhasil Di Update');
        return redirect('data_mitra')->with(['flash_message' => 'Data Berhasil Di Update', 'flash_color' => 'info']);
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

    public function data_mitra_pdf($id)
    {
        $data_mitra = DataMitra::find($id);

        if (!$data_mitra) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $pdf = PDF::loadView('data_mitra.data_mitra_pdf', ['data_mitra' => $data_mitra]);
        return $pdf->download('laporan.pdf');
    }
}
