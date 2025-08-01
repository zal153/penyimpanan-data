<?php
// app/Models/TagBerkas.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagBerkas extends Model
{
    use HasFactory;

    protected $table = 'tag_berkas';

    protected $fillable = [
        'nama',
        'slug',
        'warna',
    ];

    // Relasi: Tag memiliki banyak berkas pribadi (many-to-many)
    public function berkasPribadi()
    {
        return $this->belongsToMany(BerkasPribadi::class, 'berkas_tag', 'tag_berkas_id', 'berkas_pribadi_id')
            ->withTimestamps();
    }

    // Scope untuk mencari berdasarkan slug
    public function scopeBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    // Hitung jumlah berkas dengan tag ini
    public function jumlahBerkas()
    {
        return $this->berkasPribadi()->count();
    }
}
