<?php
// database/migrations/xxxx_xx_xx_buat_tabel_penyimpanan_data_pribadi.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Tabel kategori berkas
        Schema::create('kategori_berkas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->text('deskripsi')->nullable();
            $table->string('ikon')->nullable();
            $table->timestamps();
        });

        // Tabel tag berkas
        Schema::create('tag_berkas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('warna')->nullable();
            $table->timestamps();
        });

        // Tabel berkas pribadi (tabel utama)
        Schema::create('berkas_pribadi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategori_berkas')->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('nama_berkas');
            $table->string('nama_asli');
            $table->string('lokasi_berkas');
            $table->string('jenis_berkas'); // gambar, dokumen, audio, video, lainnya
            $table->string('tipe_mime');
            $table->bigInteger('ukuran_berkas'); // dalam bytes
            $table->json('metadata')->nullable(); // untuk data tambahan seperti dimensi, durasi, dll
            $table->enum('tingkat_privasi', ['pribadi', 'dibagikan', 'publik'])->default('pribadi');
            $table->string('token_akses')->nullable(); // untuk berbagi berkas
            $table->timestamp('berakhir_pada')->nullable(); // untuk berkas dengan akses terbatas waktu
            $table->boolean('favorit')->default(false);
            $table->boolean('diarsipkan')->default(false);
            $table->timestamps();

            $table->index(['users_id', 'jenis_berkas']);
            $table->index(['users_id', 'tingkat_privasi']);
            $table->index(['users_id', 'favorit']);
        });

        // Tabel pivot untuk berkas dan tag
        Schema::create('berkas_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('berkas_pribadi_id')->constrained('berkas_pribadi')->onDelete('cascade');
            $table->foreignId('tag_berkas_id')->constrained('tag_berkas')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['berkas_pribadi_id', 'tag_berkas_id']);
        });

        // Tabel berbagi berkas
        Schema::create('berbagi_berkas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('berkas_pribadi_id')->constrained('berkas_pribadi')->onDelete('cascade');
            $table->foreignId('dibagikan_oleh')->constrained('users')->onDelete('cascade');
            $table->foreignId('dibagikan_kepada')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('token_berbagi')->unique();
            $table->enum('izin', ['lihat', 'unduh', 'edit'])->default('lihat');
            $table->timestamp('berakhir_pada')->nullable();
            $table->boolean('aktif')->default(true);
            $table->integer('jumlah_unduhan')->default(0);
            $table->integer('jumlah_dilihat')->default(0);
            $table->timestamps();

            $table->index(['token_berbagi']);
            $table->index(['berakhir_pada']);
        });

        // Tabel aktivitas berkas
        Schema::create('aktivitas_berkas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('berkas_pribadi_id')->nullable()->constrained('berkas_pribadi')->onDelete('cascade');
            $table->string('aksi'); // unggah, unduh, lihat, hapus, bagikan, dll
            $table->text('deskripsi')->nullable();
            $table->string('alamat_ip')->nullable();
            $table->text('user_agent')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index(['users_id', 'aksi']);
            $table->index(['created_at']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('aktivitas_berkas');
        Schema::dropIfExists('berbagi_berkas');
        Schema::dropIfExists('berkas_tag');
        Schema::dropIfExists('berkas_pribadi');
        Schema::dropIfExists('tag_berkas');
        Schema::dropIfExists('kategori_berkas');
    }
};
