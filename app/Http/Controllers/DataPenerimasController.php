<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPenerimas; // Sesuaikan dengan namespace dan nama model yang benar
use Session;
use PDF;
class DataPenerimasController extends Controller
{
    public function index(){
        $data_penerimas = DataPenerimas::orderBy('id', 'asc')->paginate(5);
        $jumlah_penerima = $data_penerimas->count();        
        $no = 0;
        return view('data_penerimas.index', compact('data_penerimas' , 'no', 'jumlah_penerima'));

    }

    public function create(){
        return view('data_penerimas.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'nama_pegawai' => 'required|string',
            'NIP' => 'required|string',
            'jabatan' => 'required|string',
            'tanggal_penerimaan' => 'required|date',
            'type_barang' => 'required|string'
        ]);
        $data_penerimas = new DataPenerimas;
        $data_penerimas->nama_pegawai = $request->nama_pegawai;
        $data_penerimas->NIP = $request->NIP;
        $data_penerimas->jabatan = $request->jabatan;
        $data_penerimas->type_barang = $request->type_barang;
        $data_penerimas->jenis_barang = $request->jenis_barang;
        $data_penerimas->merk_barang = $request->merk_barang;
        $data_penerimas->jumlah_barang = $request->jumlah_barang;
        $data_penerimas->serial_number = $request->serial_number;
        $data_penerimas->kelengkapan_barang = $request->kelengkapan_barang;
        $data_penerimas->tanggal_penerimaan = $request->tanggal_penerimaan;
        $data_penerimas->status = $request->status;
        $data_penerimas->save();
        Session::flash('flash_type', 'store');
        Session::flash('flash_message', 'Data berhasil disimpan');
        return redirect('data_penerimas')->with(['flash_message' => 'Data Berhasil Disimpan', 'flash_color' => 'success']);
    }

    public function edit($id){
        $data_penerimas = DataPenerimas::find($id);
        return view('data_penerimas.edit', compact('data_penerimas'));
    }

    public function update(Request $request, $id){
        $data_penerimas = DataPenerimas::find($id);
        $data_penerimas->nama_pegawai = $request->nama_pegawai;
        $data_penerimas->NIP = $request->NIP;
        $data_penerimas->jabatan = $request->jabatan;
        $data_penerimas->type_barang = $request->type_barang;
        $data_penerimas->jenis_barang = $request->jenis_barang;
        $data_penerimas->merk_barang = $request->merk_barang;
        $data_penerimas->jumlah_barang = $request->jumlah_barang;
        $data_penerimas->serial_number = $request->serial_number;
        $data_penerimas->kelengkapan_barang = $request->kelengkapan_barang;
        $data_penerimas->tanggal_penerimaan = $request->tanggal_penerimaan;
        $data_penerimas->status = $request->status;
        if ($data_penerimas->isDirty('status') && $data_penerimas->status == 'dikembalikan') {
            $pengembalianBarang = new PengembalianBarang;
            $pengembalianBarang->DataPenerimas()->associate($data_penerimas);
            $pengembalianBarang->save();
        }
        $data_penerimas->save(); // Ganti update() menjadi save()
       
        Session::flash('flash_type', 'update');
        Session::flash('flash_message', 'Data Berhasil Di Update');
        return redirect('data_penerimas')->with(['flash_message' => 'Data Berhasil Di Update', 'flash_color' => 'info']);
        
    }

    public function destroy($id){
        $data_penerimas = DataPenerimas::find($id);
        $data_penerimas->delete();
        return redirect('data_penerimas')->with(['flash_message' => 'Data Berhasil Dihapus', 'flash_color' => 'danger']);
    }

    public function search(Request $request) {
        $batas = 5;
        $cari = $request->kata;
    
        $data_penerimas = DataPenerimas::where('nama_pegawai', 'like', '%'.$cari.'%')
            ->orWhere('NIP', 'like', '%'.$cari.'%')
            ->orWhere('jabatan', 'like', '%'.$cari.'%')
            ->paginate($batas);
    
        $no = $batas * ($data_penerimas->currentPage() - 1);
    
        return view('data_penerimas.search', compact('data_penerimas', 'cari', 'no'));
    }

    public function data_penerima_pdf($id) {
        $data_penerimas = DataPenerimas::find($id);
    
        if (!$data_penerimas) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
    
        $pdf = PDF::loadView('data_penerimas.data_penerima_pdf', ['data_penerimas' => $data_penerimas]);
        return $pdf->download('SuratBeritaAcara.pdf');
    }
    public function data_penerima_tabelpdf() {
        $data_penerimas = DataPenerimas::all();
        $pdf = PDF::loadView('data_penerimas.data_penerima_tabelpdf', ['data_penerimas' => $data_penerimas])
            ->setPaper('A4', 'landscape');
        return $pdf->stream('laporan.pdf');
    }
}
