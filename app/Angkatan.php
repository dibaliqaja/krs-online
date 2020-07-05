<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    protected $guarded = [];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function program_studi()
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
