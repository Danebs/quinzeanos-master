<?php

use Illuminate\Database\Seeder;

class Models extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'Vestido Branco','description'=>"Clássicos vestidos para casamentos.",'mark_id'=>1],
            ['name'=>'Vestido Preto','description'=>"Uma alternativa inversa dos clássicos.",'mark_id'=>1],
            ['name'=>'Vestido Colorido','description'=>"Vestidos de cores neutras",'mark_id'=>1],
            ['name'=>'Vestidos de Inverno','description'=>"Vestidos para climas frios",'mark_id'=>1],
            ['name'=>'Vestidos de Verão','Vestidos para climas quentes'=>"Testeira",'mark_id'=>1],
        ];
        DB::table('models')->insert($data);
    }
}
