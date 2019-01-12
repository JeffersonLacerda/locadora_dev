<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us009Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testDelGenreCancel()
    {
        $this->browse(function (Browser $browser) {
            $href = route('genre.destroy', 20);
            $browser->loginAs(User::find(1))
                    ->visit('/genero')
                    ->waitForText('Gêneros')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover o gênero?')
                    ->click("button[data-dismiss='modal']");
        });

        $this->assertDatabaseHas('genres', 
        [
            'id' => 20,
        ]);
    }

    public function testDelGenreOK()
    {
        $this->browse(function (Browser $browser) {
            $href = route('genre.destroy', 20);
            $browser->loginAs(User::find(1))
                    ->visit('/genero')
                    ->waitForText('Gêneros')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover o gênero?')
                    ->click("#delete-btn");
        });

        $this->assertDatabaseMissing('genres', 
        [
            'id' => 20,
        ]);
    }

    public function testDelGenreForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/genero/20/remover')
                    ->assertSee('MethodNotAllowedHttpException');
        });
    }
}
