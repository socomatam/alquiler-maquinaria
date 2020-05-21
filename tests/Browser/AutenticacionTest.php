<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AutenticacionTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost/gestion_alquiler_maquinaria/public/');
            $browser->assertSee('NOMBRE DE USUARIO O DIRECCIÓN EMAIL');
            $browser->type('#email' ,'admin@admin.com');
            $browser->type('#password' ,'csas1234');
            $browser->press('.uk-button');
            $browser->visit('http://localhost/gestion_alquiler_maquinaria/public/alquiler');

            $browser->assertSee('Listado alquiler');


        });
    }
}
