<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us028Test extends DuskTestCase
{
    public function testShowUserOK()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/usuario')
                    ->waitForText('Usuários')
                    ->keys("#DataTables_Table_0_filter input", 'user@teste.com', '{enter}')
                    ->assertSee('teste')
                    ->assertSee('Usuario Teste')
                    ->assertSee('user@teste.com')
                    ->assertSee('Administração');
        });
    }

    public function testShowUserForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/usuario')
                    ->assertSee('Acesso Negado.');
        });
    }
}
