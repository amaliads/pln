<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPenerima; // Sesuaikan dengan namespace dan nama model yang benar
use Session;
use PDF;
class DataPenerimaController extends Controller
{
    public function index(){
        $data_penerima = DataPenerima::orderBy('id', 'asc')->paginate(5);
        $jumlah_penerima = $data_penerima->count();        
        $no = 0;
        return view('data_penerima.index', compact('data_penerima' , 'no', 'jumlah_penerima'));

    }

    public function create(){
        return view('data_penerima.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'nama_pegawai' => 'required|string',
            'NIP' => 'required|string',
            'jabatan' => 'required|string',
            'tanggal_penerimaan' => 'required|date',
            'type_barang' => 'required|string'
        ]);
        $data_penerima = new DataPenerima;
        $data_penerima->nama_pegawai = $request->nama_pegawai;
        $data_penerima->NIP = $request->NIP;
        $data_penerima->jabatan = $request->jabatan;
        $data_penerima->type_barang = $request->type_barang;
        $data_penerima->jenis_barang = $request->jenis_barang;
        $data_penerima->merk_barang = $request->merk_barang;
        $data_penerima->jumlah_barang = $request->jumlah_barang;
        $data_penerima->serial_number = $request->serial_number;
        $data_penerima->kelengkapan_barang = $request->kelengkapan_barang;
        $data_penerima->tanggal_penerimaan = $request->tanggal_penerimaan;
        $data_penerima->status = $request->status;
        $data_penerima->save();
       
        Session::flash('flash_type', 'store');
        Session::flash('flash_message', 'Data berhasil disimpan');
        return redirect('data_penerima')->with(['flash_message' => 'Data Berhasil Disimpan', 'flash_color' => 'success']);
    }

    public function edit($id){
        $data_penerima = DataPenerima::find($id);
        return view('data_penerima.edit', compact('data_penerima'));
    }

    public function update(Request $request, $id){
        $data_penerima = DataPenerima::find($id);
        $data_penerima->nama_pegawai = $request->nama_pegawai;
        $data_penerima->NIP = $request->NIP;
        $data_penerima->jabatan = $request->jabatan;
        $data_penerima->type_barang = $request->type_barang;
        $data_penerima->jenis_barang = $request->jenis_barang;
        $data_penerima->merk_barang = $request->merk_barang;
        $data_penerima->jumlah_barang = $request->jumlah_barang;
        $data_penerima->serial_number = $request->serial_number;
        $data_penerima->kelengkapan_barang = $request->kelengkapan_barang;
        $data_penerima->tanggal_penerimaan = $request->tanggal_penerimaan;
        $data_penerima->status = $request->status;
        if ($data_penerima->isDirty('status') && $data_penerima->status == 'dikembalikan') {
            $pengembalianBarang = new PengembalianBarang;
            $pengembalianBarang->dataPenerima()->associate($data_penerima);
            $pengembalianBarang->save();
        }
        $data_penerima->save(); // Ganti update() menjadi save()
       
        Session::flash('flash_type', 'update');
        Session::flash('flash_message', 'Data Berhasil Di Update');
        return redirect('data_penerima')->with(['flash_message' => 'Data Berhasil Di Update', 'flash_color' => 'info']);
        
    }

    public function destroy($id){
        $data_penerima = DataPenerima::find($id);
        $data_penerima->delete();
        return redirect('data_penerima')->with(['flash_message' => 'Data Berhasil Dihapus', 'flash_color' => 'danger']);
    }

    public function search(Request $request) {
        $batas = 5;
        $cari = $request->kata;
    
        $data_penerima = DataPenerima::where('nama_pegawai', 'like', '%'.$cari.'%')
            ->orWhere('NIP', 'like', '%'.$cari.'%')
            ->orWhere('jabatan', 'like', '%'.$cari.'%')
            ->paginate($batas);
    
        $no = $batas * ($data_penerima->currentPage() - 1);
    
        return view('data_penerima.search', compact('data_penerima', 'cari', 'no'));
    }

    public function data_penerima_pdf($id) {
        $data_penerima = DataPenerima::find($id);
    
        if (!$data_penerima) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
    
        $pdf = PDF::loadView('data_penerima.data_penerima_pdf', ['data_penerima' => $data_penerima]);
        return $pdf->download('SuratBeritaAcara.pdf');
    }
    
}
