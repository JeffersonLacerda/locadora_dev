<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us005Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function testDelMediaCancel()
    {
        $this->browse(function (Browser $browser) {
            $href = route('media.destroy', 5);
            $browser->loginAs(User::find(1))
                    ->visit('/midia')
                    ->waitForText('Mídias')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover a mídia?')
                    ->click("button[data-dismiss='modal']");
        });

        $this->assertDatabaseHas('media', 
        [
            'id' => 5,
        ]);
    }

    public function testDelMediaOK()
    {
        $this->browse(function (Browser $browser) {
            $href = route('media.destroy', 5);
            $browser->loginAs(User::find(1))
                    ->visit('/midia')
                    ->waitForText('Mídias')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover a mídia?')
                    ->click("#delete-btn");
        });

        $this->assertDatabaseMissing('media', 
        [
            'id' => 5,
        ]);
    }

    public function testDelMediaForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/midia/5/remover')
                    ->assertSee('MethodNotAllowedHttpException');
        });
    }
}
