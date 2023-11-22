<?php

namespace App\Http\Controllers;

use App\Models\DataArsip;
use Illuminate\Http\Request;

class DataArsipController extends Controller
{
    public function index()
    {
        $data_arsip = DataArsip::orderBy('id', 'asc')->paginate(5);
        $no = 0;
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
            'perihal_surat' => 'required',
            'dari_surat' => 'required',
            'nama_file' => 'required|file|mimes:pdf,doc,docx|max:2048', // Validasi file
            'keterangan' => 'required',
            'tujuan_ke' => 'required',
        ]);

        if ($request->hasFile('nama_file')) {
            $file = $request->file('nama_file');
            $nama_file = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/data_arsipupload', $nama_file); // Simpan file ke direktori public/data_arsipupload
        }

        $surat = new DataArsip();
        $surat->tanggal_surat = $validatedData['tanggal_surat'];
        $surat->perihal_surat = $validatedData['perihal_surat'];
        $surat->dari_surat = $validatedData['dari_surat'];
        $surat->file_surat = $nama_file ?? null; // Gunakan null jika tidak ada file yang diunggah
        $surat->keterangan = $validatedData['keterangan'];
        $surat->tujuan_ke = $validatedData['tujuan_ke'];
        $surat->save();

        return redirect()->back()->with('success', 'Surat berhasil diunggah');
    }

    public function edit($id)
    {
        $data_arsip = DataArsip::find($id);
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
            'perihal_surat' => 'required',
            'dari_surat' => 'required',
            'keterangan' => 'required',
            'tujuan_ke' => 'required',
        ]);

        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat');
            $nama_file = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('data_arsipupload'), $nama_file);
            $data_arsip->file_surat = $nama_file;
        }

        $data_arsip->tanggal_surat = $validatedData['tanggal_surat'];
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
        $data_arsip->delete();
        return redirect('data_arsip')->with([
            'flash_message' => 'Data Berhasil Dihapus',
            'flash_color' => 'danger'
        ]);
    }
}
