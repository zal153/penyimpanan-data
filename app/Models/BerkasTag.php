<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BerkasTag extends Pivot
{
    protected $table = 'berkas_tag';

    protected $fillable = [
        'berkas_pribadi_id',
        'tag_berkas_id',
    ];

    public $timestamps = true;

    public function berkasPribadi()
    {
        return $this->belongsTo(BerkasPribadi::class, 'berkas_pribadi_id');
    }

    public function tagBerkas()
    {
        return $this->belongsTo(TagBerkas::class, 'tag_berkas_id');
    }
}
