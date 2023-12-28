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
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_penerima_id');
            $table->date('tanggal');
            $table->enum('status', ['Diterima', 'Dikembalikan'])->default('Diterima');
            // tambahkan kolom lain yang diperlukan
            $table->timestamps();
        
            $table->foreign('data_penerima_id')->references('id')->on('data_penerima')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengembalian');
    }
};
