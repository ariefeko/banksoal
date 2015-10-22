<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class soal extends Model
{
    protected $table = 'soal';

    public function matapelajaran()
    {
        return $this->belongsTo('App\Matapelajaran');
    }
}
