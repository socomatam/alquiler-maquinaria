<?php

use Illuminate\Database\Seeder;

class RepuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Repuesto::class,10)->create();
    }
}
