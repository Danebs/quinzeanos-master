<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Departaments::class);
        $this->call(Category::class);
        $this->call(Marks::class);
        $this->call(Models::class);
        $this->call(Users::class);
        $this->call(TypeContact::class);
        $this->call(Company::class);
        $this->call(Contacts::class);
        $this->call(Address::class);
    }
}
