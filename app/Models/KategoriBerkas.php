<?php
// app/Models/KategoriBerkas.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerkas extends Model
{
    use HasFactory;

    protected $table = 'kategori_berkas';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'ikon',
    ];

    // Relasi: Kategori memiliki banyak berkas pribadi
    public function berkasPribadi()
    {
        return $this->hasMany(BerkasPribadi::class, 'kategori_id');
    }

    // Scope untuk mencari berdasarkan slug
    public function scopeBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    // Hitung jumlah berkas dalam kategori
    public function jumlahBerkas()
    {
        return $this->berkasPribadi()->count();
    }
}
