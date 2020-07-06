<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $guarded = [];

    public function kartu_rencana_studi()
    {
        return $this->belongsTo(KartuRencanaStudi::class);
    }
}
