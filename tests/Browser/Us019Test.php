<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Models\Movie;

class Us019Test extends DuskTestCase
{
    public function testEditMovieBtn()
    {
        $this->browse(function (Browser $browser) {
            $movie = Movie::where('title', 'Read Dead Redemption II')->first();
            $href = route('movie.edit', $movie);
            $browser->loginAs(User::find(1))
                    ->visit('/filme')
                    ->waitForText('Filmes')
                    ->keys("input[type='search']", 'Read Dead Redemption II', '{enter}')
                    ->click("a[href='$href']")
                    ->waitForText('Modificar Filme')
                    ->assertPathIs('/filme/' . $movie->id . '/editar');
        });
    }

    public function testEditMovieOK()
    {

        $this->browse(function (Browser $browser) {
            $movie = Movie::where('title', 'Read Dead Redemption II')->first();
            $browser->loginAs(User::find(1))
                    ->visit(route('movie.edit', $movie))
                    ->waitForText('Modificar Filme')
                    ->attach('file', storage_path('\tests\02.PNG'))
                    ->type('title', 'Deus da guerra')
                    ->type('original_title', 'God of War')
                    ->click("#selectGenres~.select2 .select2-selection__choice__remove")
                    ->click("#selectGenres~.select2 .select2-selection__choice__remove")
                    ->keys("#selectGenres~.select2 input", 'Guerra', '{enter}', 'Fantasia', '{enter}')
                    ->click("#selectCountries~.select2 .select2-selection__choice__remove")
                    ->keys("#selectCountries~.select2 input", 'DK -', '{enter}', 'NO -', '{enter}')
                    ->type('year', '2018')
                    ->type('direction', 'Cory Barlog')
                    ->type('cast', 'Richard Gaubert, Matthew Sophos')
                    ->type('synopsis', 'Muitos anos se passaram desde que Kratos teve sua vingança contra os deuses do Olimpo, e agora ele vive com seu filho Atreus em Midgard. O jogo começa após a morte da segunda esposa de Kratos e mãe de Atreus, Faye. Seu último desejo era que suas cinzas fossem espalhadas no pico mais alto dos nove reinos nórdicos. Antes de iniciar sua jornada, Kratos é confrontado por um homem misterioso com poderes divinos. Depois de aparentemente matá-lo, Kratos e Atreus partiram em sua jornada. Em sua jornada, Kratos e Atreus encontram a Serpente do Mundo, Jörmungandr, que se mostra amigável. Depois de correr em névoa negra impenetrável, que só pode ser extinta com luz de Álfheim, eles recebem ajuda da Bruxa da floresta para recuperar a Pedra da Unidade para garantir a luz. Ao chegar ao pico de Midgard, eles ouvem uma conversa entre o misterioso homem, revelado como sendo Baldur, dois homens e um prisioneiro chamado Mímir. Depois que eles saem, Kratos e Atreus conversam com Mímir, que revela que o objetivo deles é, na verdade, em Jotunheim, mas viajar para lá foi bloqueado para afastar Odin e Thor. Mímir, no entanto, conhece outra passagem. Ele instrui Kratos a cortar a sua cabeça e revivê-lo através da bruxa, revelada como sendo Freya. Kratos imediatamente desconfia dele, mas ambos Freya e Mímir avisam que ele deve dizer a Atreus sobre sua verdadeira natureza e de seu passado.')
                    ->type('duraction', '135')
                    ->click('button[type=submit]')
                    ->waitForText('Filmes')
                    ->assertPathIs('/filme');
        });
        $this->assertDatabaseHas('movies', 
        [
            'title' => 'Deus da guerra',
            'original_title' => 'God of War',
            'country' => 'DK, NO',
            'year' => 2018,
            'direction' => 'Cory Barlog',
            'cast' => 'Richard Gaubert, Matthew Sophos',
            'synopsis' => 'Muitos anos se passaram desde que Kratos teve sua vingança contra os deuses do Olimpo, e agora ele vive com seu filho Atreus em Midgard. O jogo começa após a morte da segunda esposa de Kratos e mãe de Atreus, Faye. Seu último desejo era que suas cinzas fossem espalhadas no pico mais alto dos nove reinos nórdicos. Antes de iniciar sua jornada, Kratos é confrontado por um homem misterioso com poderes divinos. Depois de aparentemente matá-lo, Kratos e Atreus partiram em sua jornada. Em sua jornada, Kratos e Atreus encontram a Serpente do Mundo, Jörmungandr, que se mostra amigável. Depois de correr em névoa negra impenetrável, que só pode ser extinta com luz de Álfheim, eles recebem ajuda da Bruxa da floresta para recuperar a Pedra da Unidade para garantir a luz. Ao chegar ao pico de Midgard, eles ouvem uma conversa entre o misterioso homem, revelado como sendo Baldur, dois homens e um prisioneiro chamado Mímir. Depois que eles saem, Kratos e Atreus conversam com Mímir, que revela que o objetivo deles é, na verdade, em Jotunheim, mas viajar para lá foi bloqueado para afastar Odin e Thor. Mímir, no entanto, conhece outra passagem. Ele instrui Kratos a cortar a sua cabeça e revivê-lo através da bruxa, revelada como sendo Freya. Kratos imediatamente desconfia dele, mas ambos Freya e Mímir avisam que ele deve dizer a Atreus sobre sua verdadeira natureza e de seu passado.',
            'duraction' => 135,
            'type_id' => 2,
        ]);
    }

    public function testMovieFail()
    {
        $this->browse(function (Browser $browser) {
            $movie = Movie::where('title', 'Deus da guerra')->first();
            $browser->loginAs(User::find(1))
                ->visit(route('movie.edit', $movie))
                ->waitForText('Modificar Filme')
                ->type('title', '')
                ->type('original_title', '')
                ->click("#selectGenres~.select2 .select2-selection__choice__remove")
                ->click("#selectGenres~.select2 .select2-selection__choice__remove")
                ->keys("#selectGenres~.select2 input", '{escape}')
                ->click("#selectCountries~.select2 .select2-selection__choice__remove")
                ->click("#selectCountries~.select2 .select2-selection__choice__remove")
                ->keys("#selectCountries~.select2 input", '{escape}')
                ->type('year', '')
                ->type('direction', '')
                ->type('cast', '')
                ->type('synopsis', '')
                ->type('duraction', '')
                ->click('button[type=submit]')
                ->assertSee('O campo título é obrigatório.')
                ->assertSee('O campo título original é obrigatório.')
                ->assertSee('O campo gênero é obrigatório.')
                ->assertSee('O campo país é obrigatório.')
                ->assertSee('O campo ano é obrigatório.')
                ->assertSee('O campo direção é obrigatório.')
                ->assertSee('O campo elenco é obrigatório.')
                ->assertSee('O campo sinopse é obrigatório.')
                ->assertSee('O campo duração é obrigatório.');
        });
        $this->assertDatabaseMissing('movies',
        [
            'title' => '',
            'original_title' => '',
            'country' => '',
            'year' => 0,
            'direction' => '',
            'cast' => '',
            'synopsis' => '',
            'duraction' => 0,
        ]);

    }

    public function testEditMovieForbidden()
    {
        $this->browse(function (Browser $browser) {
            $movie = Movie::where('title', 'Deus da Guerra')->first();
            $browser->loginAs(User::find(2))
                    ->visit(route('movie.edit', $movie))
                    ->assertSee('Acesso Negado.');
        });
    }
}
