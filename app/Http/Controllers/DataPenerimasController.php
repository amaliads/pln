<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\DataPenerimas; // Sesuaikan dengan namespace dan nama model yang benar
use App\Models\DataPengembalian;
use App\Models\DataPegawai;
use App\Http\Controllers\HomeController;
use Session;
use PDF;
use DataTables;
class DataPenerimasController extends Controller
{
    public function index()
{
    $data_penerimas = DataPenerimas::orderBy('id', 'asc')->get();
    $jumlah_penerima = $data_penerimas->count();
    $no = 0;

    return view('data_penerimas.index', compact('data_penerimas', 'no', 'jumlah_penerima'));
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

    public function update(Request $request, $id)
{
    $this->validate($request, [
        'nama_pegawai' => 'required|string',
        'NIP' => 'required|string',
        'jabatan' => 'required|string',
        'type_barang' => 'required|string',
        'jenis_barang' => 'required|string',
        'merk_barang' => 'required|string',
        'jumlah_barang' => 'required|integer',
        'serial_number' => 'required|string',
        'kelengkapan_barang' => 'required|string',
        'tanggal_penerimaan' => 'required|date',
        'status' => 'required|in:DITERIMA,DIKEMBALIKAN',
    ]);

    // Find the existing DataPenerimas record
    $data_penerimas = DataPenerimas::find($id);

    if (!$data_penerimas) {
        return redirect()->route('data_penerimas.index')->with('error', 'Data tidak ditemukan.');
    }

    // Update the fields based on the request data
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

    // Check if the status is 'DIKEMBALIKAN' for additional validation
    if ($request->status === 'DIKEMBALIKAN') {
        $this->validate($request, [
            'tanggal_pengembalian' => 'required|date',
        ]);

        // If validation passes, move data to DataPengembalian
        $data_pengembalian = new DataPengembalian();
        $data_pengembalian->nama_pegawai = $data_penerimas->nama_pegawai;
        $data_pengembalian->NIP = $data_penerimas->NIP;
        $data_pengembalian->jabatan = $data_penerimas->jabatan;
        $data_pengembalian->type_barang = $data_penerimas->type_barang;
        $data_pengembalian->jenis_barang = $data_penerimas->jenis_barang;
        $data_pengembalian->merk_barang = $data_penerimas->merk_barang;
        $data_pengembalian->jumlah_barang = $data_penerimas->jumlah_barang;
        $data_pengembalian->serial_number = $data_penerimas->serial_number;
        $data_pengembalian->kelengkapan_barang = $data_penerimas->kelengkapan_barang;

        // Set 'tanggal_pengembalian' only if provided in the request
        $data_pengembalian->tanggal_pengembalian = $request->has('tanggal_pengembalian') ? $request->tanggal_pengembalian : null;

        $data_pengembalian->status = $data_penerimas->status;

        $data_pengembalian->save();

        // Optional: Delete data from DataPenerimas if needed
        $data_penerimas->delete();

        // Redirect to DataPengembalian index
        return redirect()->route('data_pengembalian.index')->with('success', 'Data berhasil diperbarui!');
    }

    // Save the updated DataPenerimas record
    $data_penerimas->save();
    

    // Redirect to DataPenerimas index
    return redirect()->route('data_penerimas.index')->with('success', 'Data berhasil diperbarui!');
}


    
    
      public function destroy($id){
        $data_penerimas = DataPenerimas::find($id);
        $data_penerimas->delete();
        return redirect('data_penerimas')->with(['flash_message' => 'Data Berhasil Dihapus', 'flash_color' => 'danger']);
    }


    public function data_penerimas_pdf($id) {
        $data_penerimas = DataPenerimas::find($id);
        $data_pegawai = DataPegawai::all();

        // Mengambil data pegawai yang tidak terkait dengan data penerima yang dipilih
        $data_pegawai = $data_pegawai->reject(function ($data_pegawai) use ($data_penerimas) {
            return $data_pegawai->id == $data_penerimas->data_pegawai_id;
        });

        if (!$data_penerimas) {
            // Jika data tidak ditemukan, Anda dapat menangani kasus ini sesuai kebutuhan
            return response()->json(['message' => 'Data Penerima tidak ditemukan'], 404);
        }
        $data_pegawai = DataPegawai::get();

        foreach ($data_pegawai as $pegawai) {
            echo $pegawai->nama_pihak;
            echo $pegawai->NIP;
            echo $pegawai->jabatan;
        }
        $nama_pegawai = $data_penerimas->nama_pegawai; // Sesuaikan dengan field yang dimiliki oleh model 'DataPenerima'
        $jabatan = $data_penerimas->jabatan; // Sesuaikan dengan field yang dimiliki oleh model 'DataPenerima'
        $type_barang = $data_penerimas->type_barang; // Sesuaikan dengan field yang dimiliki oleh model 'DataPenerima'

        $pdf = \PDF::loadView('data_penerimas.data_penerimas_pdf', compact('data_penerimas', 'data_pegawai'))->setPaper('F4', 'potrait');;

        return $pdf->stream($data_penerimas->surat_berita_acara . '.pdf');
    }

    public function showDataPenerimas($id) {
        // Assuming DataPenerima is your model
        $data_penerimas = DataPenerimas::find($id);
        $data_pegawai = DataPegawai::get();

        foreach ($data_pegawai as $pegawai) {
            echo $pegawai->nama_pihak;
            echo $pegawai->NIP;
            echo $pegawai->jabatan;
        }
    
        // Assuming you have variables $hari, $tanggal, $bulan, $tahun
        return view('data_penerimas.data_penerimas_pdf', compact('data_penerimas', 'data_pegawai' ,'hari', 'tanggal', 'bulan', 'tahun', 'jenis_barang','merk_barang', 'serial_number','kelengkapan_barang'));
    }
    

    public function data_penerima_tabelpdf() {
        $data_penerimas = DataPenerimas::all();
        $pdf = PDF::loadView('data_penerimas.data_penerima_tabelpdf', ['data_penerimas' => $data_penerimas])
            ->setPaper('A4', 'landscape');
        return $pdf->stream('laporan.pdf');
    }
}