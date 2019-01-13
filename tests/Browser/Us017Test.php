<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us017Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testDelTypeCancel()
    {
        $this->browse(function (Browser $browser) {
            $href = route('type.destroy', 3);
            $browser->loginAs(User::find(1))
                    ->visit('/tipo')
                    ->waitForText('Tipos')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover o tipo?')
                    ->click("button[data-dismiss='modal']");
        });

        $this->assertDatabaseHas('types', 
        [
            'id' => 3,
        ]);
    }

    public function testDelTypeOK()
    {
        $this->browse(function (Browser $browser) {
            $href = route('type.destroy', 3);
            $browser->loginAs(User::find(1))
                    ->visit('/tipo')
                    ->waitForText('Tipos')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover o tipo?')
                    ->click("#delete-btn");
        });

        $this->assertDatabaseMissing('types', 
        [
            'id' => 3,
        ]);
    }

    public function testDelTypeForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/tipo/3/remover')
                    ->assertSee('MethodNotAllowedHttpException');
        });
    }
}
