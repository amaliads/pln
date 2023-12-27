<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPenerimas; // Sesuaikan dengan namespace dan nama model yang benar
use App\Models\DataPengembalian;

class HomeController extends Controller
{
    public function index()
    {
        // Contoh logika untuk mengambil data dari model DataPenerima
        $jumlah_penerima = DataPenerimas::count(); // Perbaiki penulisan nama model dari DataPenerimas menjadi DataPenerima
        $data_pengembalian = DataPengembalian::count();

        // Kirim data ke view 'home.index'
        return view('home.index', compact('jumlah_penerima', 'data_pengembalian'));
    }
}
