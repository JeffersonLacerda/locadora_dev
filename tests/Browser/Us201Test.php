<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class Us201Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testSearchFindTitle()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->waitForText('Buscar:')
                    ->keys("input[type='Search']", 'super')
                    ->waitForText('Exibindo 1 até 2 de 2 registros')
                    ->assertSee('Batman vs Superman: A Origem da Justiça')
                    ->assertSee('Dragon Ball Super: Broly');
        });
    }

    public function testSearchFindOriginalTitle()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->waitForText('Buscar:')
                    ->keys("input[type='Search']", 'box')
                    ->waitForText('Exibindo 1 até 1 de 1 registros')
                    ->assertSee('Caixa de Pássaros');
        });
    }

    public function testSearchNotFind()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->waitForText('Buscar:')
                    ->keys("input[type='Search']", 'vale')
                    ->waitForText('Exibindo 0 até 0 de 0 registros')
                    ->assertSee('Nenhum registro encontrado');
        });
    }
}
