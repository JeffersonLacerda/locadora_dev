<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Models\Movie;

class Us021Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testDelMovieCancel()
    {
        $this->browse(function (Browser $browser) {
            $movie = Movie::where('title', 'Deus da Guerra')->first();
            $href = route('movie.destroy', $movie);
            $browser->loginAs(User::find(1))
                    ->visit('/filme')
                    ->waitForText('Filmes')
                    ->keys("input[type='search']", 'Deus da Guerra', '{enter}')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover o Filme?')
                    ->click("button[data-dismiss='modal']");
        });

        $this->assertDatabaseHas('movies',
        [
            'title' => 'Deus da Guerra',
        ]);
    }

    public function testDelMovieOK()
    {
        $this->browse(function (Browser $browser) {
            $movie = Movie::where('title', 'Deus da Guerra')->first();
            $href = route('movie.destroy', $movie);
            $browser->loginAs(User::find(1))
                    ->visit('/filme')
                    ->waitForText('Filmes')
                    ->keys("input[type='search']", 'Deus da Guerra', '{enter}')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover o Filme?')
                    ->click("#delete-btn");
        });

        $this->assertDatabaseMissing('movies',
        [
            'title' => 'Deus da Guerra',
        ]);

        $this->browse(function (Browser $browser) {
            $movie = Movie::where('title', 'Karatê Kid')->first();
            $href = route('movie.destroy', $movie);
            $browser->loginAs(User::find(1))
                    ->visit('/filme')
                    ->waitForText('Filmes')
                    ->keys("input[type='search']", 'Karatê Kid', '{enter}')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover o Filme?')
                    ->click("#delete-btn");
        });

        $this->assertDatabaseMissing('movies',
        [
            'title' => 'Karatê Kid',
        ]);
    }

    public function testDelMovieForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/filme/2/remover')
                    ->assertSee('MethodNotAllowedHttpException');
        });
    }
}
