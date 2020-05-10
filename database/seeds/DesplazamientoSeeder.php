<?php

use Illuminate\Database\Seeder;

class DesplazamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Desplazamiento::class,3)->create();
    }
}
