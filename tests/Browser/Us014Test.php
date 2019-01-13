<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us014Test extends DuskTestCase
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
    public function testAddTypeBtn()
    {
        $this->browse(function (Browser $browser) {
            $href = route('type.create');
            $browser->loginAs(User::find(1))
                    ->visit('/tipo')
                    ->waitForText('Tipos')
                    ->click("a[href='$href']")
                    ->waitForText('Adicionar Tipo')
                    ->assertPathIs('/tipo/adicionar');
        });
    }

    public function testAddTypeOK()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/tipo/adicionar')
                    ->type('description', 'Clássico')
                    ->type('return_deadline', '5')
                    ->type('increase', '10')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Tipo')
                    ->assertPathIs('/tipo');
        });
        $this->assertDatabaseHas('types', 
        [
            'description' => 'Clássico',
            'return_deadline' => 5,
            'increase' => 0.1,
        ]);
    }

    public function testAddTypeFail()
    {
        $this->browse(function (Browser $browser) {
            $texto = Us014Test::$texto;
            $browser->loginAs(User::find(1))
                    ->visit('/tipo/adicionar')
                    ->waitForText('Adicionar Tipo')
                    ->type('description', '')
                    ->type('return_deadline', '')
                    ->type('increase', '')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Tipo')
                    ->assertSee('O campo descrição é obrigatório.')
                    ->assertSee('O campo prazo para devolução é obrigatório.')
                    ->assertSee('O campo acréscimo ao valor de locação é obrigatório.')
                    ->type('description', $texto)
                    ->type('return_deadline', '0')
                    ->type('increase', '-10')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Tipo')
                    ->assertSee('O campo descrição não pode ser superior a 255 caracteres.')
                    ->assertSee('O prazo para devolução tem que ser maior que 0.')
                    ->assertSee('O acréscimo ao valor de locação tem que ser maior ou igual a 0.')
                    ->type('description', 'Lançamento')
                    ->type('return_deadline', 'A')
                    ->type('increase', 'A')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Tipo')
                    ->assertSee('O campo descrição já está sendo utilizado.')
                    ->assertSee('O campo prazo para devolução é obrigatório.')
                    ->assertSee('O campo acréscimo ao valor de locação é obrigatório.');
        });
        $this->assertDatabaseMissing('types', 
        [
            'description' => '',
            'return_deadline' => 0,
            'increase' => 0,
        ]);
        
        $this->assertDatabaseMissing('types', 
        [
            'description' => Us002Test::$texto,
            'return_deadline' => 0,
            'increase' => -0.1,
        ]);
        
        $this->assertDatabaseMissing('types', 
        [
            'description' => 'Lançamento',
            'return_deadline' => 'A',
            'increase' => 'A',
        ]);
    }

    public function testAddTypeForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/tipo/adicionar')
                    ->assertSee('Acesso Negado.');
        });
    }

}
