<?php

use Illuminate\Database\Seeder;

class AlquilereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Alquilere::class,1)->create();
    }
}
