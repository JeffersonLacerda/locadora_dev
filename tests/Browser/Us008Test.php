<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us008Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testShowGenreOK()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/genero')
                    ->waitForText('Gênero')
                    ->assertSee('12')
                    ->assertSee('Aventura')
                    ->assertSee('14')
                    ->assertSee('Fantasia')
                    ->assertSee('16')
                    ->assertSee('Animação');
        });
    }

    public function testShowGenreForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/genero')
                    ->assertSee('Acesso Negado.');
        });
    }
}
