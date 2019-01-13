<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us004Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testShowMediaOK()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/midia')
                    ->waitForText('Mídias')
                    ->assertSee('Blu-Ray')
                    ->assertSee('DVD')
                    ->assertSee('HD-DVD')
                    ->assertSee('VHS')
                    ->assertSee('R$ 5,00')
                    ->assertSee('R$ 7,50');
        });
    }

    public function testShowMediaForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/midia')
                    ->assertSee('Acesso Negado.');
        });
    }

}
