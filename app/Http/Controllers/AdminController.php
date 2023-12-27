<?php

namespace App\Http\Controllers;

use App\Models\DataPenerimas; // Sesuaikan dengan namespace dan nama model yang benar
use App\Models\DataPengembalian;
use App\Models\DataMitraPengembalian;
use App\Models\DataMitra;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DataPenerimasController;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function adminn()
    {
        // Contoh logika untuk mengambil data dari model DataPenerima
        $data_penerimas = DataPenerimas::count();
        $data_pengembalian = DataPengembalian::count();
        $data_mitra = DataMitra::count();
        $data_mitrapengembalian = DataMitraPengembalian::count();

        // Kirim data ke view 'home.index'
        return view('home.index', compact('data_penerimas', 'data_pengembalian', 'data_mitra', 'data_mitrapengembalian'));
    }

    public function pengguna()
    {
        $data_penerimas = DataPenerimas::count();
        $data_pengembalian = DataPengembalian::count();
        $data_mitra = DataMitra::count();
        $data_mitrapengembalian = DataMitraPengembalian::count();

        // Kirim data ke view 'home.index'
        return view('home.index', compact('data_penerimas', 'data_pengembalian', 'data_mitra', 'data_mitrapengembalian'));
        return view('home.index');
    }
}
