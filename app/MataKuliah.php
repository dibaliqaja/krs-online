<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $fillable = [
        'kode_matkul',
        'nama_matkul',
        'sks',
        'dosen_id',
        'semester',
        'program_studi_id'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function program_studi()
    {
        return $this->belongsTo(ProgramStudi::class);
    }
}
