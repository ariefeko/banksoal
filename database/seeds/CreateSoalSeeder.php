<?php

use Illuminate\Database\Seeder;

class CreateSoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('soal')->delete();
        //insert some dummy records
        DB::table('soal')->insert(array(
            array('mata_pelajaran_id'=>'3','pertanyaan'=>'apa ibukota belanda?','pilihan_a'=>'london','pilihan_b'=>'jakarta','pilihan_c'=>'singapore','pilihan_d'=>'amsterdam','pilihan_e'=>'osaka','jawaban'=>'t','gambar'=>'','user_created'=>'2'),
            array('mata_pelajaran_id'=>'2','pertanyaan'=>'apa ibukota indonesia?','pilihan_a'=>'jakarta','pilihan_b'=>'london','pilihan_c'=>'beijing','pilihan_d'=>'sydney','pilihan_e'=>'zimbabwe','jawaban'=>'f','gambar'=>'','user_created'=>'1'),
            array('mata_pelajaran_id'=>'1','pertanyaan'=>'apa ibukota amerika?','pilihan_a'=>'osaka','pilihan_b'=>'singapore','pilihan_c'=>'moskow','pilihan_d'=>'amsterdam','pilihan_e'=>'washington','jawaban'=>'t','gambar'=>'','user_created'=>'3'),
        ));
    }
}
