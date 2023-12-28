<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPengembalian;
use App\Models\DataPenerimas;
use Session;
use PDF;
use DataTables;

class DataPengembalianController extends Controller
{
    public function index()
    {
        $data_pengembalian = DataPengembalian::orderBy('id', 'asc')->get();
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
            'tanggal_pengembalian' => 'required|date',
            'status' => 'required|in:DITERIMA,DIKEMBALIKAN',
        ]);
    
        // Find the existing DataPengembalian record
        $data_pengembalian = DataPengembalian::find($id);
    
        if (!$data_pengembalian) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
    
        // Store the original status for comparison later
        $originalStatus = $data_pengembalian->status;
    
        // Update the fields based on the request data for DataPengembalian
        $data_pengembalian->fill($request->all());
    
        // Check if the status is changing
        if ($request->status !== $originalStatus) {
            if ($request->status === 'DITERIMA') {
                // Move data to DataPenerimas
                $data_penerimas = new DataPenerimas();
                $data_penerimas->nama_pegawai = $data_pengembalian->nama_pegawai;
                $data_penerimas->NIP = $data_pengembalian->NIP;
                $data_penerimas->jabatan = $data_pengembalian->jabatan;
                $data_penerimas->type_barang = $data_pengembalian->type_barang;
                $data_penerimas->jenis_barang = $data_pengembalian->jenis_barang;
                $data_penerimas->merk_barang = $data_pengembalian->merk_barang;
                $data_penerimas->jumlah_barang = $data_pengembalian->jumlah_barang;
                $data_penerimas->serial_number = $data_pengembalian->serial_number;
                $data_penerimas->kelengkapan_barang = $data_pengembalian->kelengkapan_barang;
                $data_penerimas->tanggal_penerimaan = $data_pengembalian->tanggal_pengembalian;
                $data_penerimas->status = 'DITERIMA';
                $data_penerimas->save();
    
                // Delete data from DataPengembalian
                $data_pengembalian->delete();
                
                return redirect()->route('data_penerimas.index')->with('success', 'Data berhasil diperbarui dan dipindahkan ke DataPenerimas!');
            } elseif ($request->status === 'DIKEMBALIKAN') {
                // Additional validation for 'DIKEMBALIKAN' status
                $this->validate($request, [
                    'tanggal_pengembalian' => 'required|date',
                ]);
            }
        }
    
        // Save the updated DataPengembalian record
        $data_pengembalian->save();
    
        // Redirect to DataPengembalian index
        return redirect()->route('data_pengembalian.index')->with('success', 'Data berhasil diperbarui!');
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

    public function data_pengembalian_pdf()
    {
        $data_pengembalian = DataPengembalian::all();
        $pdf = PDF::loadView('data_pengembalian.data_pengembalian_pdf', ['data_pengembalian' => $data_pengembalian])
            ->setPaper('A4', 'landscape');
        return $pdf->stream('laporan.pdf');
    }
}
