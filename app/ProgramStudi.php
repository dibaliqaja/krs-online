<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function mata_kuliah()
    {
        return $this->hasMany(MataKuliah::class);
    }
}
