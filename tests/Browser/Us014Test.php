<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us014Test extends DuskTestCase
{
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
                    ->type('description', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa')
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
            'description' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
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
