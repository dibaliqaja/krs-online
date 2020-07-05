<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nidn',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'agama',
        'alamat',
        'no_hp',
        'avatar',
        'email',
        'password',
        'avatar',
        'program_studi_id'
    ];

    public function program_studi()
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    public function angkatan()
    {
        return $this->hasMany(Dosen::class);
    }

    public function mata_kuliah()
    {
        return $this->hasMany(MataKuliah::class);
    }
}
