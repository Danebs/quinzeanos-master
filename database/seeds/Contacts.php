<?php

use Illuminate\Database\Seeder;

class Contacts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('contacts')->insert([
            ['contact'=>'31993012467','type_contact_id'=>1,'company_id'=>1],
            ['contact'=>'3134504311','type_contact_id'=>2,'company_id'=>1],
            ['contact'=>'wellingtonfds@gmail.com','type_contact_id'=>3,'company_id'=>1],
        ]);
    }
}
