<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'npm',
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
        'program_studis_id',
        'semesters_id',
        'angkatans_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function program_studi()
    {
        return $this->belongsTo(ProgramStudi::class, 'program_studis_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semesters_id');
    }

    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class, 'angkatans_id');
    }
}
