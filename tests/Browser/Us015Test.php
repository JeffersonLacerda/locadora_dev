<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us015Test extends DuskTestCase
{

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testEditTypeBtn()
    {
        $this->browse(function (Browser $browser) {
            $href = route('type.edit', 3);
            $browser->loginAs(User::find(1))
                    ->visit('/tipo')
                    ->waitForText('Tipos')
                    ->click("a[href='$href']")
                    ->waitForText('Modificar Tipo')
                    ->assertPathIs('/tipo/3/editar');
        });
    }

    public function testEditTypeOK()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/tipo/3/editar')
                    ->waitForText('Modificar Tipo')
                    ->type('description', 'Clássico')
                    ->type('return_deadline', '4')
                    ->type('increase', '0')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Tipo')
                    ->assertPathIs('/tipo');
        });
        $this->assertDatabaseHas('types', 
        [
            'description' => 'Clássico',
            'return_deadline' => 4,
            'increase' => 0.0,
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/tipo/3/editar')
                    ->waitForText('Modificar Tipo')
                    ->type('description', 'Super Lançamento')
                    ->type('return_deadline', '1')
                    ->type('increase', '100')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Tipo')
                    ->assertPathIs('/tipo');
        });
        $this->assertDatabaseHas('types', 
        [
            'description' => 'Super Lançamento',
            'return_deadline' => 1,
            'increase' => 1.0,
        ]);
    }

    public function testEditTypeFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/tipo/3/editar')
                    ->waitForText('Modificar Tipo')
                    ->type('description', '')
                    ->type('return_deadline', '')
                    ->type('increase', '')
                    ->click('button[type=submit]')
                    ->waitForText('Modificar Tipo')
                    ->assertSee('O campo descrição é obrigatório.')
                    ->assertSee('O campo prazo para devolução é obrigatório.')
                    ->assertSee('O campo acréscimo ao valor de locação é obrigatório.')
                    ->type('description', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa')
                    ->type('return_deadline', '0')
                    ->type('increase', '-10')
                    ->click('button[type=submit]')
                    ->waitForText('Modificar Tipo')
                    ->assertSee('O campo descrição não pode ser superior a 255 caracteres.')
                    ->assertSee('O prazo para devolução tem que ser maior que 0.')
                    ->assertSee('O acréscimo ao valor de locação tem que ser maior ou igual a 0.')
                    ->type('description', 'Lançamento')
                    ->type('return_deadline', 'A')
                    ->type('increase', 'A')
                    ->click('button[type=submit]')
                    ->waitForText('Modificar Tipo')
                    ->assertSee('O campo descrição já está sendo utilizado.')
                    ->assertSee('O campo prazo para devolução é obrigatório.')
                    ->assertSee('O campo acréscimo ao valor de locação é obrigatório.');
        });
        $this->assertDatabaseMissing('types', 
        [
            'description' => '',
            'return_deadline' => '',
            'increase' => '',
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

    public function testEditTypeForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/tipo/3/editar')
                    ->assertSee('Acesso Negado.');
        });
    }

}
