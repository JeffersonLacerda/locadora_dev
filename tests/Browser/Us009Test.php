<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Models\Genre;

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
            $genre = Genre::where('description','Heróis')->first();
            $href = route('genre.destroy', $genre->id);
            $browser->loginAs(User::find(1))
                    ->visit('/genero')
                    ->waitForText('Gêneros')
                    ->keys("input[type='search']", 'Heróis', '{enter}')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover o gênero?')
                    ->click("button[data-dismiss='modal']");
        });

        $this->assertDatabaseHas('genres', 
        [
            'description' => 'Heróis',
        ]);
    }

    public function testDelGenreOK()
    {
        $this->browse(function (Browser $browser) {
            $genre = Genre::where('description','Heróis')->first();
            $href = route('genre.destroy', $genre->id);
            $browser->loginAs(User::find(1))
                    ->visit('/genero')
                    ->waitForText('Gêneros')
                    ->keys("input[type='search']", 'Heróis', '{enter}')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover o gênero?')
                    ->click("#delete-btn");
        });

        $this->assertDatabaseMissing('genres', 
        [
            'description' => 'Heróis',
        ]);
    }

    public function testDelGenreForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/genero/1/remover')
                    ->assertSee('MethodNotAllowedHttpException');
        });
    }
}
