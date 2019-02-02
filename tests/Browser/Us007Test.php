<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us007Test extends DuskTestCase
{

    /**
     * A Dusk test example.
     *
     * @return void
     */
    
    public function testEditGenreBtn()
    {
        $this->browse(function (Browser $browser) {
            $href = route('genre.edit', 20);
            $browser->loginAs(User::find(1))
                    ->visit('/genero')
                    ->waitForText('Gêneros')
                    ->click("a[href='$href']")
                    ->waitForText('Modificar Gênero')
                    ->assertPathIs('/genero/20/editar');
        });
    }

    public function testEditGenreOK()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/genero/20/editar')
                    ->waitForText('Modificar Gênero')
                    ->type('description', 'Esporte')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Gênero')
                    ->assertPathIs('/genero');
        });
        $this->assertDatabaseHas('genres', 
        [
            'description' => 'Esporte',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/genero/20/editar')
                    ->waitForText('Modificar Gênero')
                    ->type('description', 'Heróis')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Gênero')
                    ->assertPathIs('/genero');
        });
        $this->assertDatabaseHas('genres', 
        [
            'description' => 'Heróis',
        ]);
    }

    public function testEditGenreFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/genero/20/editar')
                    ->waitForText('Modificar Gênero')
                    ->type('description', '')
                    ->click('button[type=submit]')
                    ->waitForText('Modificar Gênero')
                    ->assertSee('O campo descrição é obrigatório.')
                    ->type('description', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa')
                    ->click('button[type=submit]')
                    ->waitForText('Modificar Gênero')
                    ->assertSee('O campo descrição não pode ser superior a 255 caracteres.')
                    ->type('description', 'Ação')
                    ->click('button[type=submit]')
                    ->waitForText('Modificar Gênero')
                    ->assertSee('O campo descrição já está sendo utilizado.');
        });
        $this->assertDatabaseMissing('genres', 
        [
            'description' => '',
        ]);
        
        $this->assertDatabaseMissing('genres', 
        [
            'description' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
        ]);
        
        $this->assertDatabaseMissing('genres', 
        [
            'description' => 'Steaming Digital',
        ]);
    }

    public function testEditGenreForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/genero/20/editar')
                    ->assertSee('Acesso Negado.');
        });
    }

}
