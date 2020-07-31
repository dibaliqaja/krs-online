<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KartuRencanaStudi extends Model
{
    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class)->with('angkatan');
    }

    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

    public function angkatan()
    {
        return $this->belongsToMany(Angkatan::class);
    }
}
