<?php
// app/Models/BerkasPribadi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BerkasPribadi extends Model
{
    use HasFactory;

    protected $table = 'berkas_pribadi';

    protected $fillable = [
        'users_id',
        'kategori_id',
        'judul',
        'deskripsi',
        'nama_berkas',
        'nama_asli',
        'lokasi_berkas',
        'jenis_berkas',
        'tipe_mime',
        'ukuran_berkas',
        'metadata',
        'tingkat_privasi',
        'token_akses',
        'berakhir_pada',
        'favorit',
        'diarsipkan',
    ];

    protected $casts = [
        'metadata' => 'array',
        'berakhir_pada' => 'datetime',
        'favorit' => 'boolean',
        'diarsipkan' => 'boolean',
    ];

    // Relasi: Berkas dimiliki oleh pengguna
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // Relasi: Berkas memiliki kategori
    public function kategori()
    {
        return $this->belongsTo(KategoriBerkas::class, 'kategori_id');
    }

    // Relasi: Berkas memiliki banyak tag (many-to-many)
    public function tags()
    {
        return $this->belongsToMany(TagBerkas::class, 'berkas_tag', 'berkas_pribadi_id', 'tag_berkas_id')
            ->withTimestamps();
    }

    // Relasi: Berkas memiliki banyak sharing
    public function berbagi()
    {
        return $this->hasMany(BerbagiBerkas::class, 'berkas_pribadi_id');
    }

    // Relasi: Berkas memiliki banyak aktivitas
    public function aktivitas()
    {
        return $this->hasMany(AktivitasBerkas::class, 'berkas_pribadi_id');
    }

    // Scope untuk berkas favorit
    public function scopeFavorit($query)
    {
        return $query->where('favorit', true);
    }

    // Scope untuk berkas yang diarsipkan
    public function scopeDiarsipkan($query)
    {
        return $query->where('diarsipkan', true);
    }

    // Scope untuk berkas yang tidak diarsipkan
    public function scopeTidakDiarsipkan($query)
    {
        return $query->where('diarsipkan', false);
    }

    // Scope berdasarkan jenis berkas
    public function scopeJenisBerkas($query, $jenis)
    {
        return $query->where('jenis_berkas', $jenis);
    }

    // Scope berdasarkan tingkat privasi
    public function scopeTingkatPrivasi($query, $tingkat)
    {
        return $query->where('tingkat_privasi', $tingkat);
    }

    // Scope untuk berkas milik pengguna tertentu
    public function scopeMilikPengguna($query, $penggunaId)
    {
        return $query->where('pengguna_id', $penggunaId);
    }

    // Accessor untuk URL berkas
    public function getUrlBerkasAttribute()
    {
        return Storage::url($this->lokasi_berkas);
    }

    // Accessor untuk ukuran berkas yang readable
    public function getUkuranReadableAttribute()
    {
        $bytes = $this->ukuran_berkas;
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    // Cek apakah berkas adalah gambar
    public function isGambar()
    {
        return $this->jenis_berkas === 'gambar';
    }

    // Cek apakah berkas adalah dokumen
    public function isDokumen()
    {
        return $this->jenis_berkas === 'dokumen';
    }

    // Cek apakah berkas adalah audio
    public function isAudio()
    {
        return $this->jenis_berkas === 'audio';
    }

    // Cek apakah berkas adalah video
    public function isVideo()
    {
        return $this->jenis_berkas === 'video';
    }

    // Cek apakah berkas bisa diakses publik
    public function isPublik()
    {
        return $this->tingkat_privasi === 'publik';
    }

    // Cek apakah berkas dibagikan
    public function isDibagikan()
    {
        return $this->tingkat_privasi === 'dibagikan';
    }
}
