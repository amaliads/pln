<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_mitra', function (Blueprint $table) {
            $table->id();            
            $table->string('mitra_pengirim');
            $table->string('type_barang');
            $table->string('jenis_barang');
            $table->string('merk_barang');
            $table->string('serial_number');
            $table->string('jumlah_barang');
            $table->string('kelengkapan_barang');
            $table->date('tanggal_penerimaan');
            $table->date('tanggal_pengembalian')->nullable();
            $table->string('yang_menerima');
            $table->string('status');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_mitra');
    }
};
