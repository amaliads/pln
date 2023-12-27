<?php

namespace App\Http\Controllers;
use App\Models\DataPegawai;
use App\Models\DataPenerimas;
use Illuminate\Http\Request;

class DataPegawaiController extends Controller
{
    public function index()
    {
        $data_pegawai = DataPegawai::orderBy('id', 'asc')->get();
        $jumlah_penerima = $data_pegawai->count();
        $no = 0;
    
        return view('data_pegawai.index', compact('data_pegawai', 'no', 'jumlah_penerima'));
    }
    
        public function create(){
            return view('data_pegawai.create');
        }
        public function store(Request $request){
            $this->validate($request,[
                'nama_pihak' => 'required|string',
                'NIP' => 'required|string',
                'jabatan' => 'required|string',
                'alamat' => 'required|string',
            ]);
            $data_pegawai = new DataPegawai;
            $data_pegawai->nama_pihak = $request->nama_pihak;
            $data_pegawai->NIP = $request->NIP;
            $data_pegawai->jabatan = $request->jabatan;
            $data_pegawai->alamat = $request->alamat;
            $data_pegawai->save();
            Session::flash('flash_type', 'store');
            Session::flash('flash_message', 'Data berhasil disimpan');
            return redirect('data_pegawai')->with(['flash_message' => 'Data Berhasil Disimpan', 'flash_color' => 'success']);
        }
    
        public function edit($id){
            $data_pegawai = DataPegawai::find($id);
            return view('data_pegawai.edit', compact('data_pegawai'));
        }
    
        public function update(Request $request, $id){
            $data_pegawai = DataPegawai::find($id);
            $data_pegawai->nama_pihak = $request->nama_pihak;
            $data_pegawai->NIP = $request->NIP;
            $data_pegawai->jabatan = $request->jabatan;
            $data_pegawai->alamat = $request->alamat;
            $data_pegawai->save();
            return redirect()->route('data_pegawai.index')->with('success', 'Status berhasil diperbarui!');
        }
}
