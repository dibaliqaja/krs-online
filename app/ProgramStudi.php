<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    protected $guarded = [];

    public function dosen()
    {
        return $this->hasMany(Dosen::class);
    }

    public function angkatan()
    {
        return $this->hasMany(Angkatan::class);
    }

    public function mata_kuliah()
    {
        return $this->hasMany(MataKuliah::class);
    }
}
