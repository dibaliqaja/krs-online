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
}
