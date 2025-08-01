<?php
// app/Models/BerbagiBerkas.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerbagiBerkas extends Model
{
    use HasFactory;

    protected $table = 'berbagi_berkas';

    protected $fillable = [
        'berkas_pribadi_id',
        'dibagikan_oleh',
        'dibagikan_kepada',
        'token_berbagi',
        'izin',
        'berakhir_pada',
        'aktif',
        'jumlah_unduhan',
        'jumlah_dilihat',
    ];

    protected $casts = [
        'berakhir_pada' => 'datetime',
        'aktif' => 'boolean',
    ];

    // Relasi: Berbagi berkas milik berkas pribadi
    public function berkasPribadi()
    {
        return $this->belongsTo(BerkasPribadi::class, 'berkas_pribadi_id');
    }

    // Relasi: Berkas dibagikan oleh pengguna
    public function pembagi()
    {
        return $this->belongsTo(User::class, 'dibagikan_oleh');
    }

    // Relasi: Berkas dibagikan kepada pengguna
    public function penerima()
    {
        return $this->belongsTo(User::class, 'dibagikan_kepada');
    }

    // Scope untuk berbagi yang aktif
    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    // Scope untuk berbagi yang belum kedaluwarsa
    public function scopeBelumKedaluwarsa($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('berakhir_pada')
                ->orWhere('berakhir_pada', '>', now());
        });
    }

    // Scope berdasarkan token
    public function scopeByToken($query, $token)
    {
        return $query->where('token_berbagi', $token);
    }

    // Cek apakah masih valid
    public function isValid()
    {
        if (!$this->aktif) {
            return false;
        }

        if ($this->berakhir_pada && $this->berakhir_pada->isPast()) {
            return false;
        }

        return true;
    }

    // Tambah hitungan view
    public function tambahView()
    {
        $this->increment('jumlah_dilihat');
    }

    // Tambah hitungan download
    public function tambahDownload()
    {
        $this->increment('jumlah_unduhan');
    }
}
