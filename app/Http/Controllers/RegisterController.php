<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;                                                                                            
use Session;

class RegisterController extends Controller
{
    public function index(){
        $data_register = DataRegister::orderBy('id', 'asc')->paginate(5);       
        $no = 0;
        return view('data_register.index', compact('data_register' , 'no'));

    }

    public function create(){
        return view('data_register.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'role'=>'required',
            'email'=>'required|email|unique:users',
            'nohp'=>'required',
            'alamat'=>'required',
            'jabatan'=>'required',
            'password'=>'required|min:6',
        ]);
        $data_register = new DataRegister;
        $data_register->name = $request->name;
        $data_register->role = $request->role;
        $data_register->email = $request->email;
        $data_register->nohp = $request->nohp;
        $data_register->alamat = $request->alamat;
        $data_register->jabatan = $request->jabatan;
        $data_register->password = Hash::make($request->password);
        $data_register->save();
       
        Session::flash('flash_type', 'store');
        Session::flash('flash_message', 'Data berhasil disimpan');
        return redirect('data_register')->with(['flash_message' => 'Data Berhasil Disimpan', 'flash_color' => 'success']);
    }

    public function edit(){
        $data_register = DataRegister::all();
        return view('data_register.edit', compact('data_register'));
    }

    public function update(Request $request)
    {
        // Ambil data user yang sedang login (asumsi menggunakan Auth)
        $data_register = DataRegister::find(auth()->user()->id);
    
        // Periksa apakah data user ditemukan
        if (!$data_register) {
            return redirect()->route('myprofil')->with('error', 'User not found.');
        }
    
        // Update data
        $data_register->email = $request->email;
    
        // Periksa apakah ada perubahan pada password
        if ($request->has('password')) {
            $data_register->password = bcrypt($request->password);
        }
    
        // Simpan perubahan
        $data_register->save();
    
        // Memberikan pesan session "Password berhasil diperbarui"
        return redirect('/myprofil')->with('success', 'Password berhasil diperbarui.');

    }
}