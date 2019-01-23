<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us024Test extends DuskTestCase
{
    public function testShowItemOK()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/item')
                    ->waitForText('Itens')
                    ->keys("#DataTables_Table_0_filter input", '09876543211234567890', '{enter}')
                    ->assertSee('09876543211234567890')
                    ->assertSee('17/01/2019')
                    ->assertSee('Aquaman')
                    ->assertSee('Blu-Ray');
        });
    }

    public function testShowItemForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/item')
                    ->assertSee('Acesso Negado.');
        });
    }
}
