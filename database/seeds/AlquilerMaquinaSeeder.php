<?php

use Illuminate\Database\Seeder;

class AlquilerMaquinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Alquilere_maquina::class,50)->create();
    }
}
