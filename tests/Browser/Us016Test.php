<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us016Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testShowTypeOK()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/tipo')
                    ->waitForText('Tipos')
                    ->assertSee('3')
                    ->assertSee('0,00 %')
                    ->assertSee('Lançamento')
                    ->assertSee('1')
                    ->assertSee('50,00 %')
                    ->assertSee('Catálogo');
        });
    }

    public function testShowTypeForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/tipo')
                    ->assertSee('Acesso Negado.');
        });
    }
}
