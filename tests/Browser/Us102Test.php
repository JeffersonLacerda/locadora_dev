<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us102Test extends DuskTestCase
{
    public function testAddClientBtn()
    {
        $this->browse(function (Browser $browser) {
            $href = route('client.create');
            $browser->loginAs(User::find(2))
                    ->visit('/cliente')
                    ->waitForText('Clientes')
                    ->click("a[href='$href']")
                    ->waitForText('Adicionar Cliente')
                    ->assertPathIs('/cliente/adicionar');
        });
    }

    public function testAddClientOK()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/cliente/adicionar')
                    ->type('name', 'Cliente Teste 01')
                    ->type('email', 'cliente@teste01.com')
                    ->type('birth_date', '10/20/1980')
                    ->select('gender','Masculino')
                    ->type('cpf', '00000000000')
                    ->type('place', 'Rua de Teste 01')
                    ->type('number', '100')
                    ->type('complement', 'Próximo da locadora')
                    ->type('district', 'Centro')
                    ->type('city', 'Recife')
                    ->type('state', 'PE')
                    ->type('country', 'Brasil')
                    ->type('workplace', 'Desenvolvedor')
                    ->type('home_phone', '87-1234-4321')
                    ->type('cell_phone', '87-09876-6789')
                    ->type('work_phone', '87-5555-5555')
                    ->click('button[type=submit]')
                    ->waitForText('Clientes')
                    ->assertPathIs('/cliente');
        });
        $this->assertDatabaseHas('clients',
        [
            'name' => 'Cliente Teste 01',
            'email' => 'cliente@teste01.com',
            'birth_date' => '1980-10-20',
            'gender' => 'Masculino',
            'type' => 'Titular',
        ]);
        $this->assertDatabaseHas('holders',
        [
            'cpf' => '00000000000',
            'place' => 'Rua de Teste 01',
            'number' => '100',
            'complement' => 'Próximo da locadora',
            'district' => 'Centro',
            'city' => 'Recife',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'Desenvolvedor',
            'home_phone' => '87-1234-4321',
            'cell_phone' => '87-09876-6789',
            'work_phone' => '87-5555-5555',
            'active' => TRUE,
        ]);
    }

    public function testAddclienteFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/cliente/adicionar')
                    ->type('name', '')
                    ->type('email', '')
                    ->type('birth_date', '')
                    ->type('cpf', '')
                    ->type('place', '')
                    ->type('number', '')
                    ->type('complement', '')
                    ->type('district', '')
                    ->type('city', '')
                    ->type('state', '')
                    ->type('country', '')
                    ->type('workplace', '')
                    ->type('home_phone', '')
                    ->type('cell_phone', '')
                    ->type('work_phone', '')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Cliente')
                    ->assertSee('O campo nome é obrigatório.')
                    ->assertSee('O campo email é obrigatório.')
                    ->assertSee('O campo data de nascimento é obrigatório.')
                    ->assertSee('O campo cpf é obrigatório.')
                    ->assertSee('O campo logradouro é obrigatório.')
                    ->assertSee('O campo bairro é obrigatório.')
                    ->assertSee('O campo cidade é obrigatório.')
                    ->assertSee('O campo país é obrigatório.')
                    ->assertSee('O campo telefone celular é obrigatório.');
        });
        $this->assertDatabaseMissing('clients',
        [
            'name' => '',
            'email' => '',
            'birth_date' => '',
            'gender' => '',
            'type' => '',
        ]);
        $this->assertDatabaseMissing('holders',
        [
            'cpf' => '',
            'place' => '',
            'number' => '',
            'complement' => '',
            'district' => '',
            'city' => '',
            'state' => '',
            'country' => '',
            'workplace' => '',
            'home_phone' => '',
            'cell_phone' => '',
            'work_phone' => '',
            'active' => TRUE,
        ]);

    }

    public function testAddClientForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/cliente/adicionar')
                    ->assertSee('Acesso Negado.');
        });
    }
}
