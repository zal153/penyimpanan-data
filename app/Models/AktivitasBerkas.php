<?php
// app/Models/AktivitasBerkas.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitasBerkas extends Model
{
    use HasFactory;

    protected $table = 'aktivitas_berkas';

    protected $fillable = [
        'users_id',
        'berkas_pribadi_id',
        'aksi',
        'deskripsi',
        'alamat_ip',
        'user_agent',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    // Relasi: Aktivitas milik pengguna
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // Relasi: Aktivitas terkait berkas pribadi
    public function berkasPribadi()
    {
        return $this->belongsTo(BerkasPribadi::class, 'berkas_pribadi_id');
    }

    // Scope berdasarkan aksi
    public function scopeAksi($query, $aksi)
    {
        return $query->where('aksi', $aksi);
    }

    // Scope untuk aktivitas hari ini
    public function scopeHariIni($query)
    {
        return $query->whereDate('created_at', today());
    }

    // Scope untuk aktivitas minggu ini
    public function scopeMingguIni($query)
    {
        return $query->whereBetween('created_at', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ]);
    }

    // Static method untuk log aktivitas
    public static function log($penggunaId, $aksi, $deskripsi = null, $berkasId = null, $metadata = [])
    {
        return static::create([
            'pengguna_id' => $penggunaId,
            'berkas_pribadi_id' => $berkasId,
            'aksi' => $aksi,
            'deskripsi' => $deskripsi,
            'alamat_ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'metadata' => $metadata,
        ]);
    }
}
