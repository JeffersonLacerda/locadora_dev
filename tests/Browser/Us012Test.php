<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us012Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testShowDistributorOK()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/distribuidora')
                    ->waitForText('Distribuidoras')
                    ->assertSee('03918609000132')
                    ->assertSee('63296355000190')
                    ->assertSee('Wmix Distribuidora Ltda')
                    ->assertSee('DVD World')
                    ->assertSee('Tiago Vinicius Sales - (48) 3035-9700')
                    ->assertSee('Cauê Paulo Corte Real - (11) 3044-0700');
        });
    }

    public function testShowDistributorForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/distribuidora')
                    ->assertSee('Acesso Negado.');
        });
    }
}
