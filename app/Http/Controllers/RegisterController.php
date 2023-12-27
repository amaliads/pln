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
    public function add(){
        return view('data_register.add');
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

    public function forget(){
        $data_register = DataRegister::all();
        return view('data_register.forget', compact('data_register'));
    }

    public function updateforget(Request $request)
{
    // Validasi input yang diperlukan (contoh: email, password)
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Temukan pengguna berdasarkan alamat email
    $user = DataRegister::where('email', $request->input('email'))->first();

    // Periksa apakah pengguna ditemukan
    if ($user) {
        // Update password
        $user->password = bcrypt($request->input('password'));
        
        // Simpan perubahan
        $user->save();
        
        // Memberikan pesan bahwa password berhasil diperbarui
        return redirect('/')->with('success', 'Password berhasil diperbarui.');
    }
    
    // Pengguna tidak ditemukan, maka redirect dengan pesan error
    return redirect('/')->with('error', 'Email tidak ditemukan.');
}

}