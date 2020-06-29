<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KartuRencanaStudi extends Model
{
    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class)->with('program_studi');
    }

    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }
}
