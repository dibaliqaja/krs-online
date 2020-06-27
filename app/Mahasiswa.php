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
        'name',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'agama',
        'alamat',
        'no_hp',
        'avatar',
        'user_id',
        'program_studi_id',
        'semester_id',
        'angkatan_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program_studi()
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class);
    }
}
