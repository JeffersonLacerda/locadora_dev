<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us013Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testDelDistributorCancel()
    {
        $this->browse(function (Browser $browser) {
            $href = route('distributor.destroy', 10);
            $browser->loginAs(User::find(1))
                    ->visit('/distribuidora')
                    ->waitForText('Distribuidoras')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover essa distribuidora?')
                    ->click("button[data-dismiss='modal']");
        });

        $this->assertDatabaseHas('distributors', 
        [
            'id' => 10,
        ]);
    }

    public function testDelDistributorOK()
    {
        $this->browse(function (Browser $browser) {
            $href = route('distributor.destroy', 10);
            $browser->loginAs(User::find(1))
                    ->visit('/distribuidora')
                    ->waitForText('Distribuidoras')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover essa distribuidora?')
                    ->click("#delete-btn");
        });

        $this->assertDatabaseMissing('distributors', 
        [
            'id' => 10,
        ]);
    }

    public function testDelDistributorForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/distribuidora/10/remover')
                    ->assertSee('MethodNotAllowedHttpException');
        });
    }
}
