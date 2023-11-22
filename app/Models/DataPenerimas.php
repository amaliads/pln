<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\DataPenerimasController;
use App\Http\Controllers\data_penerimas_tabelpdf;

class DataPenerimas extends Model
{
        use HasFactory;

        protected $table = 'data_penerimas';
    
}
