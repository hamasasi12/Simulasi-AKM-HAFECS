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
        // Cek apakah tabel students sudah ada, jika ada maka hapus dulu
        if (Schema::hasTable('students')) {
            Schema::dropIfExists('students');
        }
        
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            $table->string('kelas');
            $table->string('asal_sekolah');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('jenis_kelamin');
            $table->string('jenjang_pendidikan');
            $table->uuid('token')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};