<?php

use Illuminate\Database\Seeder;

class ComplementoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Complemento::class,10)->create();

    }
}
