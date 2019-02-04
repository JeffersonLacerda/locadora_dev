<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us104Test extends DuskTestCase
{
    public function testShowClientOK()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/cliente')
                    ->waitForText('Clientes')
                    ->keys("#DataTables_Table_0_filter input", 'cliente@teste01.com', '{enter}')
                    ->assertSee('Cliente Teste 01')
                    ->assertSee('00000000000')
                    ->assertSee('87-09876-6789')
                    ->assertSee('0');
        });
    }

    public function testShowClientForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/cliente')
                    ->assertSee('Acesso Negado.');
        });
    }
}
