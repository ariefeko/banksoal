<?php

use Illuminate\Database\Seeder;

class CreateMatapelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matapelajaran')->delete();
        //insert some dummy records
        DB::table('matapelajaran')->insert(array(
            array('jenjang'=>'sd','pelajaran'=>'matematika','tahun_ajaran'=>'2014','user_created'=>'budi'),
            array('jenjang'=>'smp','pelajaran'=>'fisika','tahun_ajaran'=>'2015','user_created'=>'sinta'),
            array('jenjang'=>'sma','pelajaran'=>'bahasa inggris','tahun_ajaran'=>'2014','user_created'=>'permadi'),
        ));
    }
}
