<?php

use Illuminate\Database\Seeder;

class Marks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'Novos','description'=>"Novos vestidos na loja."],
            ['name'=>'Tradicionais','description'=>"Vestidos tradicionais em ocassiões especiais. "],
            ['name'=>'Simples','description'=>"Simplicidade com todo o charme de uma noiva"],
            ['name'=>'Exóticos','description'=>"Todo charme em estilos diferentes."],
        ];
        DB::table('marks')->insert($data);
    }
}
