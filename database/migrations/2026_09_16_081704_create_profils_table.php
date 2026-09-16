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
        Schema::create('profil', function (Blueprint $table) {
            $table->id();
            $table->string('namaSekolah', 40);
            $table->string('kepalaSekolah', 40);
            $table->string('foto', 100);
            $table->string('logo', 100);
            $table->string('npsn', 10);
            $table->text('alamat');
            $table->string('kontak', 15);
            $table->text('visiMisi');
            $table->year('tahunBerdiri');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil');
    }
};
