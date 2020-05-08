<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(AlquilereSeeder::class);
        $this->call(TrabajadoreSeeder::class);
        $this->call(MaquinaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AlquilerMaquinaSeeder::class);
        $this->call(ComplementoSeeder::class);
    }
}
