<?php

use Illuminate\Database\Seeder;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'Vestidos', 'description'=>'Vestido', 'publish'=>true,'department_id'=>1],
            ['name'=>'Acessorios', 'description'=>'Acessórios de casamento.', 'publish'=>true,'department_id'=>1],
            ['name'=>'Novos', 'description'=>'Vestidos Novos Vestidos.', 'publish'=>true,'department_id'=>1],
            ['name'=>'Simples', 'description'=>'Vestidos Simples', 'publish'=>true,'department_id'=>1],
            ['name'=>'Exótico', 'description'=>'Vestidos Exóticos', 'publish'=>true,'department_id'=>1],
            ['name'=>'Tradicional', 'description'=>'Vestidos tradicionais.', 'publish'=>true,'department_id'=>1],
        ];
        DB::table('categories')->insert($data);
    }
}
