<?php

use Illuminate\Database\Seeder;

class Company extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['name'=>'Favorita Noivas', 'cnpj'=>'0000-000000', 'who_are_us'=>'Nós somos uma loja volta para vendas de vestidos para Casamentos & festas de 15 anos.','resume'=>'Nós estamos localizados no centro de Belo Horizonte MG no Edifício Mariana','Facebook'=>'Facebook'];
        DB::table('companies')->insert($data);
    }
}
