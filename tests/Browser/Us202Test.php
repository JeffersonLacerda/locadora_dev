<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class Us202Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testSearchAdvanced()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->waitForText('Exibindo 1 até 10')
                    /* Busca por título */
                    ->click('#lblBA')
                    ->waitForText('Busca avançada:')
                    ->type('title', 'Homens')
                    ->click('#btnAdvancedSearch')
                    ->waitForText('Exibindo 1 até 1 de 1 registros') 
                    ->assertSee('Homens De Honra')
                    /* Busca por título oririnal*/
                    ->click('#lblBA')
                    ->waitForText('Busca avançada:')
                    ->click('#btnClear')
                    ->type('original_title', 'Beauty')
                    ->click('#btnAdvancedSearch')
                    ->waitForText('Exibindo 1 até 1 de 1 registros') 
                    ->assertSee('Beleza Oculta')
                    /* Busca por gênero */
                    ->click('#lblBA')
                    ->waitForText('Busca avançada:')
                    ->click('#btnClear')
                    ->keys("input[placeholder='Selecione o gênero']", 'Faroeste', '{enter}')
                    ->click('#btnAdvancedSearch')
                    ->waitForText('Exibindo 1 até 1 de 1 registros') 
                    ->assertSee('O Regresso')
                    /* Busca por tipo mídia */
                    ->click('#lblBA')
                    ->waitForText('Busca avançada:')
                    ->click('#btnClear')
                    ->keys("input[placeholder='Selecione o tipo de Mídia']", 'VHS', '{enter}')
                    ->click('#btnAdvancedSearch')
                    ->waitForText('Exibindo 1 até 10 de 23 registros') 
                    ->assertSee('Coração de Dragão')
                    /* Busca por elenco */
                    ->click('#lblBA')
                    ->waitForText('Busca avançada:')
                    ->click('#btnClear')
                    ->type('cast', 'Renato')
                    ->click('#btnAdvancedSearch')
                    ->waitForText('Exibindo 1 até 3 de 3 registros') 
                    ->assertSee('Os Saltimbancos Trapalhões')
                    /* Busca por direção */
                    ->click('#lblBA')
                    ->waitForText('Busca avançada:')
                    ->click('#btnClear')
                    ->type('direction', 'Carlos Diegues')
                    ->click('#btnAdvancedSearch')
                    ->waitForText('Exibindo 1 até 1 de 1 registros') 
                    ->assertSee('Deus é Brasileiro')
                    /* Busca por nacionalidade */
                    ->click('#lblBA')
                    ->waitForText('Busca avançada:')
                    ->click('#btnClear')
                    ->keys("input[placeholder='Selecione a nacionalidade']", 'BR', '{enter}')
                    ->click('#btnAdvancedSearch')
                    ->waitForText('Exibindo 1 até 8 de 8 registros') 
                    ->assertSee('Até que a Sorte nos Separe')
                    /* Busca por tipo (catálogo ou lançamento) */
                    ->click('#lblBA')
                    ->waitForText('Busca avançada:')
                    ->click('#btnClear')
                    ->keys("input[placeholder='Selecione o tipo (Catálogo ou Lançamento)']", 'Lançamento', '{enter}')
                    ->click('#btnAdvancedSearch')
                    ->waitForText('Exibindo 1 até 10 de 35 registros') 
                    ->assertSee('Bumblebee')
                    /* Busca combinada */
                    /* Tipo: Catálogo */
                    ->click('#lblBA')
                    ->waitForText('Busca avançada:')
                    ->click('#btnClear')
                    ->keys("input[placeholder='Selecione o tipo (Catálogo ou Lançamento)']", 'Catálogo', '{enter}')
                    ->click('#btnAdvancedSearch')
                    ->waitForText('Exibindo 1 até 10 de 67 registros') 
                    ->assertSee('Armageddon')
                    /* Busca combinada */
                    /* Nacionalidade: US, Tipo: Catálogo */
                    ->click('#lblBA')
                    ->waitForText('Busca avançada:')
                    ->keys("input[placeholder='Selecione a nacionalidade']", 'US', '{enter}')
                    ->click('#btnAdvancedSearch')
                    ->waitForText('Exibindo 1 até 10 de 56 registros') 
                    ->assertSee('Contato')
                    /* Busca combinada */
                    /* Gênero: Ficção científica, Nacionalidade: US, Tipo: Catálogo */
                    ->click('#lblBA')
                    ->waitForText('Busca avançada:')
                    ->keys("input[placeholder='Selecione o gênero']", 'Ficção Científica', '{enter}')
                    ->click('#btnAdvancedSearch')
                    ->waitForText('Exibindo 1 até 10 de 23 registros') 
                    ->assertSee('Fenômeno')
                    /* Busca combinada */
                    /* Gênero: Ficção científica, Mídia: Blu-Ray, Nacionalidade: US, Tipo: Catálogo */
                    ->click('#lblBA')
                    ->waitForText('Busca avançada:')
                    ->keys("input[placeholder='Selecione o tipo de Mídia']", 'Blu-Ray', '{enter}')
                    ->click('#btnAdvancedSearch')
                    ->waitForText('Exibindo 1 até 10 de 17 registros') 
                    ->assertSee('Independence Day: O Ressurgimento')
                    /* Busca combinada */
                    /* Titulo: Star Wars, Gênero: Ficção científica, Mídia: Blu-Ray, Nacionalidade: US, Tipo: Catálogo */
                    ->click('#lblBA')
                    ->waitForText('Busca avançada:')
                    ->type('title', 'Star Wars')
                    ->click('#btnAdvancedSearch')
                    ->waitForText('Exibindo 1 até 2 de 2 registros') 
                    ->assertSee('Star Wars: Os Últimos Jedi')
                    /* Busca combinada */
                    /* Titulo: Star Wars, Gênero: Ficção científica, Mídia: Blu-Ray, Nacionalidade: US, Tipo: Catálogo */
                    ->click('#lblBA')
                    ->waitForText('Busca avançada:')
                    ->type('cast', 'Harrison Ford')
                    ->click('#btnAdvancedSearch')
                    ->waitForText('Exibindo 1 até 1 de 1 registros') 
                    ->assertSee('Star Wars: O Despertar da Força')
                    ;
        });
    }
}
