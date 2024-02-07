<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meta-data', function (Blueprint $table) {
            $table->id('meta_id');
            $table->string('nidn')->unique();
            $table->string('nama');
            $table->string('judul');
            $table->text('gambar');
            $table->string('deskripsi');
            $table->string('3d_objek');
            $table->string('nama_benda');
            $table->date('tahun_pembuatan');
            $table->date('periode_pembuatan_awal');
            $table->date('periode_pembuatan_akhir');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
