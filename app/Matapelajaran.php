<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matapelajaran extends Model
{
    protected $table = 'matapelajaran';
    protected $fillable = ['id','jenjang','pelajaran','tahun_ajaran','user_created'];

    public function soal()
    {
        return $this->hasMany('App\Soal');
    }
}
