<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us003Test extends DuskTestCase
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

    public function testEditMediaBtn()
    {
        $this->browse(function (Browser $browser) {
            $href = route('media.edit', 5);
            $browser->loginAs(User::find(1))
                    ->visit('/midia')
                    ->waitForText('Mídias')
                    ->click("a[href='$href']")
                    ->waitForText('Modificar Mídia')
                    ->assertPathIs('/midia/5/editar');
        });
    }

    public function testEditMediaOK()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/midia/5/editar')
                    ->waitForText('Modificar Mídia')
                    ->type('description', 'Flash Drive')
                    ->type('rental_price', '8')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Mídia')
                    ->assertPathIs('/midia');
        });
        $this->assertDatabaseHas('media', 
        [
            'description' => 'Flash Drive',
            'rental_price' => 8,
        ]);
    }

    public function testEditMediaFail()
    {
        $this->browse(function (Browser $browser) {
            $texto = Us003Test::$texto;
            $browser->loginAs(User::find(1))
                    ->visit('/midia/5/editar')
                    ->waitForText('Modificar Mídia')
                    ->type('description', '')
                    ->type('rental_price', '')
                    ->click('button[type=submit]')
                    ->waitForText('Modificar Mídia')
                    ->assertSee('O campo descrição é obrigatório.')
                    ->assertSee('O campo valor da locação é obrigatório.')
                    ->type('description', $texto)
                    ->type('rental_price', '0')
                    ->click('button[type=submit]')
                    ->waitForText('Modificar Mídia')
                    ->assertSee('O campo descrição não pode ser superior a 255 caracteres.')
                    ->assertSee('O valor da locação tem que ser maior que 0.')
                    ->type('description', 'DVD')
                    ->type('rental_price', 'A')
                    ->click('button[type=submit]')
                    ->waitForText('Modificar Mídia')
                    ->assertSee('O campo descrição já está sendo utilizado.')
                    ->assertSee('O campo valor da locação é obrigatório.');
        });
        $this->assertDatabaseMissing('media', 
        [
            'description' => '',
            'rental_price' => '',
        ]);
        
        $this->assertDatabaseMissing('media', 
        [
            'description' => Us002Test::$texto,
            'rental_price' => 0,
        ]);
        
        $this->assertDatabaseMissing('media', 
        [
            'description' => 'Steaming Digital',
            'rental_price' => 'A',
        ]);
    }

    public function testEditMediaForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/midia/5/editar')
                    ->assertSee('Acesso Negado.');
        });
    }

}
