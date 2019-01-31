<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Models\Movie;

class Us020Test extends DuskTestCase
{
    
    public function testShowMovieOK()
    {
        $this->browse(function (Browser $browser) {
            $movie = Movie::where('title', 'Karatê Kid')->first();
            $href = route('movie_details', $movie);
            $browser->loginAs(User::find(1))
                    ->visit('/filme')
                    ->waitForText('Filmes')
                    ->keys("input[type='search']", 'Karatê Kid', '{enter}')
                    ->assertSee('Karatê Kid')
                    ->assertSee('Ação, Aventura, Drama, Família')
                    ->assertSee('2010')
                    ->assertSee('Catálogo')
                    ->click("a[chave='$href']")
                    ->waitForText('Filme:')
                    ->assertSee('Título: Karatê Kid')
                    ->assertSee('Título original: The Karate Kid')
                    ->assertSee('Duração: 140 min')
                    ->assertSee('País: CN, US')
                    ->assertSee('Ano: 2010')
                    ->assertSee('Direção: Harald Zwart');
        });
    }

    public function testShowMovieForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/filme')
                    ->assertSee('Acesso Negado.');
        });
    }

}
