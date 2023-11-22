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
        Schema::create('data_arsip', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_surat');
            $table->string('perihal_surat');
            $table->string('dari_surat');
            $table->string('file_surat');
            $table->text('keterangan')->nullable();
            $table->string('tujuan_ke');
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
        Schema::dropIfExists('data_arsip');
    }
};
