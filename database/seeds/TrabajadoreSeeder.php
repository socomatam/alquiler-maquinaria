<?php

use Illuminate\Database\Seeder;

class TrabajadoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Trabajadore::class,5)->create();
    }
}
