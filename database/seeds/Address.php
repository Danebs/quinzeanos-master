<?php

use Illuminate\Database\Seeder;

class Address extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('addresses')->insert([
            ['name'=>'Matriz','address'=>'Rua do rosário 201','neighborhood'=>'Centro','city'=>'Belo Horizonte','state'=>'MG','zip'=>'33.478-785','reference'=>"",'company_id'=>1],
            ['name'=>'Filial','address'=>'Rua do rosário 202','neighborhood'=>'Carlos prates','city'=>'Belo Horizonte','state'=>'MG','zip'=>'33.111-785','reference'=>"",'company_id'=>1],
        ]);
    }
}
