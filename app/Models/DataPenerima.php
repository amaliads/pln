<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\DataPenerimaController;

class DataPenerima extends Model
{
    use HasFactory;

    protected $table = 'data_penerima';
}
