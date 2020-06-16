<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $fillable = [
        'kode_matkul',
        'nama_matkul',
        'sks',
        'dosens_id'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosens_id');
    }
}
