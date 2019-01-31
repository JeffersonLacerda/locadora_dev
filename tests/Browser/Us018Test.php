<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us018Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAddMovieBtn()
    {
        $this->browse(function (Browser $browser) {
            $href = route('movie.create');
            $browser->loginAs(User::find(1))
                    ->visit('/filme')
                    ->waitForText('Filmes')
                    ->click("a[href='$href']")
                    ->waitForText('Adicionar Filme')
                    ->assertPathIs('/filme/adicionar');
        });
    }

    public function testAddMovieOK()
    {

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/filme/adicionar')
                    ->waitForText('Adicionar Filme')
                    ->attach('file', storage_path('\tests\01.PNG'))
                    ->type('title', 'Read Dead Redemption II')
                    ->type('original_title', 'Read Dead Redemption II')
                    ->keys("input[placeholder='Selecione os gêneros']", 'Ação', '{enter}', 'Aventura', '{enter}')
                    ->keys("input[placeholder='Selecione a nacionalidade']", 'Estados Unidos', '{enter}')
                    ->type('year', '2018')
                    ->type('direction', 'Rockstar Games')
                    ->type('cast', 'Aaron Garbut')
                    ->type('synopsis', 'Estados Unidos, 1899. O fim da era do velho oeste começou.')
                    ->type('duraction', '160')
                    ->click("#select2-selectType-container")
                    ->keys(".select2-search--dropdown .select2-search__field", 'Lançamento', '{enter}')
                    ->click('button[type=submit]')
                    ->waitForText('Filmes')
                    ->assertPathIs('/filme');
        });

        $this->assertDatabaseHas('movies', 
        [
            'title' => 'Read Dead Redemption II',
            'original_title' => 'Read Dead Redemption II',
            'country' => 'US',
            'year' => 2018,
            'direction' => 'Rockstar Games',
            'cast' => 'Aaron Garbut',
            'synopsis' => 'Estados Unidos, 1899. O fim da era do velho oeste começou.',
            'duraction' => 160,
            'type_id' => 2,
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/filme/adicionar')
                    ->waitForText('Adicionar Filme')
                    ->type('txtTmdb', 'Karate kid')
                    ->click("#searchTmdb")
                    ->waitForText('The Movie Database')
                    ->click("a[href='http://locadora/filme/adicionar/38575']")
                    ->waitForText('Adicionar Filme')
                    ->assertPathIs('/filme/adicionar/38575')
                    ->click('button[type=submit]')
                    ->waitForText('Filmes')
                    ->assertPathIs('/filme');
        });

        $this->assertDatabaseHas('movies', 
        [
            'title' => 'Karatê Kid',
            'original_title' => 'The Karate Kid',
            'country' => 'CN, US',
            'year' => 2010,
            'direction' => 'Harald Zwart',
            'cast' => 'Jaden Smith, Jackie Chan, Taraji P. Henson, Yu Rong-Guang, Tess Liu, Xu Ming, Wang Ji, Wenwen Han, Zhensu Wu, Zhiheng Wang, Zhenwei Wang, Jared Minns, Shijia Lü, Zhao Yi, Bo Zhang, Luke Carberry, Cameron Hillman, Ghye Samuel Brown, Liang Geliang',
            'synopsis' => 'Dre Parker (Jaden Smith) se mudou com a mãe (Taraji P. Henson) para Pequim, devido ao trabalho dela. Logo ao chegar ele se interessa por Meiying (Han Wenwen), uma garota que conhece praticando violino na praça. A aproximação deles provoca a irritação de Cheng (Zhenwei Wang), que lhe dá uma surra usando a técnica do kung fu. A partir de então a vida de Dre se torna um inferno, já que passa a ser perseguido na escola por Cheng e seus colegas. Um dia, ao escapar deles, Dre é auxiliado pelo sr. Han (Jackie Chan), o zelador de seu prédio, que é também um mestre de kung fu.',
            'duraction' => 140,
            'type_id' => 1,
        ]);

    }

    public function testAddMovieFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/filme/adicionar')
                    ->waitForText('Adicionar Filme')
                    ->click('button[type=submit]')
                    ->assertSee('O campo capa é obrigatório.')
                    ->assertSee('O campo título é obrigatório.')
                    ->assertSee('O campo título original é obrigatório.')
                    ->assertSee('O campo gênero é obrigatório.')
                    ->assertSee('O campo país é obrigatório.')
                    ->assertSee('O campo ano é obrigatório.')
                    ->assertSee('O campo direção é obrigatório.')
                    ->assertSee('O campo elenco é obrigatório.')
                    ->assertSee('O campo sinopse é obrigatório.')
                    ->assertSee('O campo duração é obrigatório.')
                    ->assertSee('O campo tipo é obrigatório.')
                    ;
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

    public function testAddMovieForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/filme/adicionar')
                    ->assertSee('Acesso Negado.');
        });
    }
}
