<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us011Test extends DuskTestCase
{
    public static $texto = "
    O vídeo fornece uma maneira poderosa de ajudá-lo a provar seu argumento. 
    Ao clicar em Vídeo Online, você pode colar o código de inserção do vídeo que deseja adicionar. 
    Você também pode digitar uma palavra-chave para pesquisar online o vídeo mais adequado ao seu documento. 
    Para dar ao documento uma aparência profissional, o Word fornece designs de cabeçalho, rodapé, 
    folha de rosto e caixa de texto que se complementam entre si. 
    Por exemplo, você pode adicionar uma folha de rosto, um cabeçalho e uma barra lateral correspondentes. 
    Clique em Inserir e escolha os elementos desejados nas diferentes galerias. 
    Temas e estilos também ajudam a manter seu documento coordenado. 
    Quando você clica em Design e escolhe um novo tema, as imagens, gráficos e elementos gráficos SmartArt 
    são alterados para corresponder ao novo tema. 
    ";
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testEditDistributorBtn()
    {
        $this->browse(function (Browser $browser) {
            $href = route('distributor.edit', 10);
            $browser->loginAs(User::find(1))
                    ->visit('/distribuidora')
                    ->waitForText('Distribuidoras')
                    ->click("a[href='$href']")
                    ->waitForText('Modificar Distribuidora')
                    ->assertPathIs('/distribuidora/10/editar');
        });
    }

    public function testEditDistributorOK()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/distribuidora/10/editar')
                    ->waitForText('Modificar Distribuidora')
                    ->type('cnpj', '21972621000107')
                    ->type('corporate_name', 'Tenório Filmes')
                    ->type('contact_name', 'Jobson Tenório')
                    ->type('contact_phone', '(81) 99156-7056')
                    ->type('place', 'Rua Erasmo R. de M. Freitas')
                    ->type('number', '57')
                    ->type('complement', '')
                    ->type('district', 'Edson Mororó Moura')
                    ->type('city', 'Belo Jardim')
                    ->type('state', 'PE')
                    ->type('country', 'Brasil')
                    ->type('cep', '55150630')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Distribuidora')
                    ->assertPathIs('/distribuidora');
        });
        $this->assertDatabaseHas('distributors', 
        [
            'cnpj' => '21972621000107',
            'corporate_name' => 'Tenório Filmes',
            'contact_name' => 'Jobson Tenório',
            'contact_phone' => '(81) 99156-7056',
            'place' => 'Rua Erasmo R. de M. Freitas',
            'number' => 57,
            'complement' => null,
            'district' => 'Edson Mororó Moura',
            'city' => 'Belo Jardim',
            'state' => 'PE',
            'country' => 'Brasil',
            'cep' => '55150630',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/distribuidora/10/editar')
                    ->waitForText('Modificar Distribuidora')
                    ->type('cnpj', '72729588000120')
                    ->type('corporate_name', 'Souza Filmes')
                    ->type('contact_name', 'Wellyson Fernando')
                    ->type('contact_phone', '(87) 98104-1869')
                    ->type('place', 'Rua Reynaldo Bomer')
                    ->type('number', '413')
                    ->type('complement', '')
                    ->type('district', 'Cidade Satélite Íris')
                    ->type('city', 'Campinas')
                    ->type('state', 'SP')
                    ->type('country', 'Brasil')
                    ->type('cep', '13053251')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Distribuidora')
                    ->assertPathIs('/distribuidora');
        });
        $this->assertDatabaseHas('distributors', 
        [
            'cnpj' => '72729588000120',
            'corporate_name' => 'Souza Filmes',
            'contact_name' => 'Wellyson Fernando',
            'contact_phone' => '(87) 98104-1869',
            'place' => 'Rua Reynaldo Bomer',
            'number' => '413',
            'complement' => null,
            'district' => 'Cidade Satélite Íris',
            'city' => 'Campinas',
            'state' => 'SP',
            'country' => 'Brasil',
            'cep' => '13053251',
        ]);

    }

    public function testEditDistributorFail()
    {
        $this->browse(function (Browser $browser) {
            $texto = Us010Test::$texto;
            $browser->loginAs(User::find(1))
                    ->visit('/distribuidora/10/editar')
                    ->waitForText('Modificar Distribuidora')
                    ->type('cnpj', '')
                    ->type('corporate_name', '')
                    ->type('contact_name', '')
                    ->type('contact_phone', '')
                    ->type('place', '')
                    ->type('number', '')
                    ->type('complement', '')
                    ->type('district', '')
                    ->type('city', '')
                    ->type('state', '')
                    ->type('country', '')
                    ->type('cep', '')
                    ->click('button[type=submit]')
                    ->waitForText('Modificar Distribuidora')
                    ->assertSee('O campo CNPJ é obrigatório.')
                    ->assertSee('O campo razão social é obrigatório.')
                    ->assertSee('O campo pessoa de contato é obrigatório.')
                    ->assertSee('O campo telefone de contato é obrigatório.')
                    ->assertSee('O campo logradouro é obrigatório.')
                    ->assertSee('O campo bairro é obrigatório.')
                    ->assertSee('O campo cidade é obrigatório.')
                    ->assertSee('O campo estado é obrigatório.')
                    ->assertSee('O campo país é obrigatório.')
                    ->assertSee('O campo CEP é obrigatório.')
                    ;
        });
        $this->assertDatabaseMissing('distributors', 
        [
            'cnpj' => '',
            'corporate_name' => '',
            'contact_name' => '',
            'contact_phone' => '',
            'place' => '',
            'number' => '',
            'complement' => '',
            'district' => '',
            'city' => '',
            'state' => '',
            'country' => '',
            'cep' => '',   
        ]);

    }

    public function testEditDistributorForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/distribuidora/10/editar')
                    ->assertSee('Acesso Negado.');
        });
    }


}
