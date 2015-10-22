<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class soal extends Model
{
    protected $table = 'soal';
    protected $fillable = ['mata_pelajaran_id','pertanyaan','pilihan_a','pilihan_b','pilihan_c','pilihan_d','pilihan_e','jawaban','gambar','user_created'];

    public function matapelajaran()
    {
        return $this->belongsTo('App\Matapelajaran');
    }
}
