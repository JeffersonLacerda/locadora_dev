<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us006Test extends DuskTestCase
{

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAddGenreBtn()
    {
        $this->browse(function (Browser $browser) {
            $href = route('genre.create');
            $browser->loginAs(User::find(1))
                    ->visit('/genero')
                    ->waitForText('Gêneros')
                    ->click("a[href='$href']")
                    ->waitForText('Adicionar Gênero')
                    ->assertPathIs('/genero/adicionar');
        });
    }

    public function testAddGenreOK()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/genero/adicionar')
                    ->type('tmdb_id', '1')
                    ->type('description', 'Esportes')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Gênero')
                    ->assertPathIs('/genero');
        });
        $this->assertDatabaseHas('genres', 
        [
            'tmdb_id' => 1,
            'description' => 'Esportes',
        ]);
    }

    public function testAddGenreFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/genero/adicionar')
                    ->waitForText('Adicionar Gênero')
                    ->type('tmdb_id', '')
                    ->type('description', '')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Gênero')
                    ->assertSee('O campo código TMDb é obrigatório.')
                    ->assertSee('O campo descrição é obrigatório.')
                    ->type('tmdb_id', '0')
                    ->type('description', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Gênero')
                    ->assertSee('O código TMDb tem que ser maior que 0.')
                    ->assertSee('O campo descrição não pode ser superior a 255 caracteres.')
                    ->type('tmdb_id', '28')
                    ->type('description', 'Ação')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Gênero')
                    ->assertSee('O campo código TMDb já está sendo utilizado.')
                    ->assertSee('O campo descrição já está sendo utilizado.');
        });
        $this->assertDatabaseMissing('genres', 
        [
            'tmdb_id' => '',
            'description' => '',
        ]);
        
        $this->assertDatabaseMissing('genres', 
        [
            'tmdb_id' => 0,
            'description' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
        ]);
        
        $this->assertDatabaseMissing('genres', 
        [
            'tmdb_id' => 'A',
            'description' => 'Streaming Digital',
        ]);
    }

    public function testAddGenreForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/genero/adicionar')
                    ->assertSee('Acesso Negado.');
        });
    }

}
