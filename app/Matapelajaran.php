<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matapelajaran extends Model
{
    protected $table = 'matapelajaran';

    public function soal()
    {
        return $this->hasMany('App\Soal');
    }
}
