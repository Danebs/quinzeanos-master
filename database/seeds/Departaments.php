<?php

use Illuminate\Database\Seeder;

class Departaments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'peças', 'description'=>'peças', 'publish'=>true],
            ['name'=>'produtos', 'description'=>'produtos', 'publish'=>true],
        ];
        DB::table('departments')->insert($data);
    }
}
