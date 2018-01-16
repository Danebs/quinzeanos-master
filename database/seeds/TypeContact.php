<?php

use Illuminate\Database\Seeder;

class TypeContact extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['type'=>'Celular'],
            ['type'=>'Telefone fixo'],
            ['type'=>'Email'],
            ['type'=>'Skype'],
            ['type'=>'Whatsapp'],

        ];
        \Illuminate\Support\Facades\DB::table('type_contacts')->insert($data);
    }
}
