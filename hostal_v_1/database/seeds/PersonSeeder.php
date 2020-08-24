<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('persons')->insert([
            ['name'=>'Stiv Anthony','surname'=>'CHoque Mamani','dni'=>'76039986'],
            ['name'=>'Erick Danny','surname' =>'CHoque Mamani','dni'=>'76039987'],
            ['name'=>'Raul','surname'=>'CHoque Lipa','dni'=>'23005556'],
            ['name'=>'Helen Brigith','surname'=>'Villanueva Condezo','dni'=>'76039985'],
            ['name'=>'Antonia','surname'=>'Mamani Aronaca','dni'=>'23016272'],
        ]);

    }
}
