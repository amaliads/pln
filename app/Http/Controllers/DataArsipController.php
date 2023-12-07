<?php

namespace App\Http\Controllers;

use App\Models\DataArsip;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DataArsipController extends Controller
{
    public function index()
    {
        $data_arsip = DataArsip::orderBy('id', 'asc')->paginate(10);
        $no = 1; // Mulai nomor dari 1, bukan 0
        return view('data_arsip.index', compact('data_arsip', 'no'));
    }
    
    public function create()
    {
        return view('data_arsip.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'tanggal_surat' => 'required',
        'nomor_surat' => 'required',
        'perihal_surat' => 'required',
        'dari_surat' => 'required',
        'file_surat' => 'required|file|mimes:pdf,doc,docx|max:2048', // Validasi file
        'keterangan' => 'required',
        'tujuan_ke' => 'required',
    ]);

    $file_surat = null; // Inisialisasi variabel $file_surat di luar kondisi

    if ($request->hasFile('file_surat')) {
        $file = $request->file('file_surat');
        $file_surat_name = time() . '_' . $file->getClientOriginalName(); // Ubah variabel $file_surat menjadi $file_surat_name

        // Simpan file ke direktori storage/app/public/data_arsipupload
        $file->storeAs('public/data_arsipupload', $file_surat_name); // Perbaiki path penyimpanan file

        // Simpan file_surat tanpa 'public/' agar bisa diakses dari URL
        $file_surat = 'data_arsipupload/' . $file_surat_name;
    }

    $surat = new DataArsip();
    $surat->tanggal_surat = $validatedData['tanggal_surat'];
    $tanggal_surat = Carbon::createFromFormat('Y-m-d', $validatedData['tanggal_surat'])
                        ->format('d/m/Y');
    $surat->nomor_surat = $validatedData['nomor_surat'];
    $surat->perihal_surat = $validatedData['perihal_surat'];
    $surat->dari_surat = $validatedData['dari_surat'];
    $surat->file_surat = $file_surat; // Gunakan nilai default null jika tidak ada file yang diunggah
    $surat->keterangan = $validatedData['keterangan'];
    $surat->tujuan_ke = $validatedData['tujuan_ke'];
    $surat->save();

    return redirect()->route('data_arsip.index')->with('success', 'Data berhasil disimpan!');
}
    public function edit($id)
    {
        $data_arsip = DataArsip::find($id);
        
        if (!$data_arsip) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return view('data_arsip.edit', compact('data_arsip'));
    }

    public function update(Request $request, $id)
    {
        $data_arsip = DataArsip::find($id);

        if (!$data_arsip) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $validatedData = $request->validate([
            'tanggal_surat' => 'required',
            'nomor_surat' => 'required',
            'perihal_surat' => 'required',
            'dari_surat' => 'required',
            'keterangan' => 'required',
            'tujuan_ke' => 'required',
        ]);

        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat');
            $file_surat = time() . '_' . $file->getClientOriginalName();
            if (!$file->move(public_path('data_arsipupload'), $file_surat)) {
                return redirect()->back()->with('error', 'Gagal menyimpan file');
            }
            $data_arsip->file_surat = $file_surat;
        }

        $data_arsip->tanggal_surat = $validatedData['tanggal_surat'];
        $data_arsip->nomor_surat = $validatedData['nomor_surat'];
        $data_arsip->perihal_surat = $validatedData['perihal_surat'];
        $data_arsip->dari_surat = $validatedData['dari_surat'];
        $data_arsip->keterangan = $validatedData['keterangan'];
        $data_arsip->tujuan_ke = $validatedData['tujuan_ke'];
        $data_arsip->save();

        return redirect('data_arsip')->with([
            'flash_message' => 'Data Berhasil Diupdate',
            'flash_color' => 'info'
        ]);
    }

    public function destroy($id)
    {
        $data_arsip = DataArsip::find($id);

        if (!$data_arsip) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $data_arsip->delete();
        return redirect('data_arsip')->with([
            'flash_message' => 'Data Berhasil Dihapus',
            'flash_color' => 'danger'
        ]);
    }
}
