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
       
        $this->call(ComplementoSeeder::class);
        $this->call(RepuestoSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(TipoSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(DesplazamientoSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(ModeloSeeder::class);
        
    }
}
