<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Models\Client;


class Us103Test extends DuskTestCase
{
    public function testEditClientBtn()
    {
        $this->browse(function (Browser $browser) {
            $client = Client::with('holder')->where('email', 'cliente@teste01.com')->first();
            $href = route('client.edit', $client);
            $browser->loginAs(User::find(2))
                    ->visit('/cliente')
                    ->waitForText('Clientes')
                    ->keys("#DataTables_Table_0_filter input", 'cliente@teste01.com', '{enter}')
                    ->click("a[href='$href']")
                    ->waitForText('Modificar Cliente')
                    ->assertPathIs('/cliente/' . $client->id . '/editar');
        });
    }

    public function testEditClientOK()
    {

        $this->browse(function (Browser $browser) {
            $client = Client::with('holder')->where('email', 'cliente@teste01.com')->first();
            $browser->loginAs(User::find(2))
                    ->visit(route('client.edit', $client))
                    ->waitForText('Modificar Cliente')
                    ->type('name', 'Cliente Teste 01 Modificado')
                    ->type('email', 'cliente@teste01.com.br')
                    ->type('birth_date', '10/15/1980')
                    ->select('gender','Feminino')
                    ->type('cpf', '00000000001')
                    ->type('place', 'Rua de Teste 02')
                    ->type('number', '101')
                    ->type('complement', 'Próximo da locadora2')
                    ->type('district', 'Prado')
                    ->type('city', 'Olinda')
                    ->type('state', 'PE')
                    ->type('country', 'Brasil')
                    ->type('workplace', 'Testador')
                    ->type('home_phone', '87-1234-43210')
                    ->type('cell_phone', '87-09876-67890')
                    ->type('work_phone', '87-5555-55550')
                    ->click('button[type=submit]')
                    ->waitForText('Clientes')
                    ->assertPathIs('/cliente');
        });
        $this->assertDatabaseHas('clients',
        [
            'name' => 'Cliente Teste 01 Modificado',
            'email' => 'cliente@teste01.com.br',
            'birth_date' => '1980-10-15',
            'gender' => 'Feminino',
            'type' => 'Titular',
        ]);
        $this->assertDatabaseHas('holders',
        [
            'cpf' => '00000000001',
            'place' => 'Rua de Teste 02',
            'number' => '101',
            'complement' => 'Próximo da locadora2',
            'district' => 'Prado',
            'city' => 'Olinda',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'Testador',
            'home_phone' => '87-1234-43210',
            'cell_phone' => '87-09876-67890',
            'work_phone' => '87-5555-55550',
            'active' => TRUE,
        ]);
        $this->browse(function (Browser $browser) {
            $client = Client::with('holder')->where('email', 'cliente@teste01.com.br')->first();
            $browser->loginAs(User::find(2))
                    ->visit(route('client.edit', $client))
                    ->waitForText('Modificar Cliente')
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

    public function testEditClientFail()
    {
        $this->browse(function (Browser $browser) {
            $client = Client::with('holder')->where('email', 'cliente@teste01.com')->first();
            $browser->loginAs(User::find(2))
                    ->visit(route('client.edit', $client))
                    ->waitForText('Modificar Cliente')
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
                    ->waitForText('Modificar Cliente')
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

    public function testEditClientForbidden()
    {
        $this->browse(function (Browser $browser) {
            $client = Client::with('holder')->where('email', 'cliente@teste01.com')->first();
            $browser->loginAs(User::find(1))
                    ->visit(route('client.edit', $client))
                    ->assertSee('Acesso Negado.');
        });
    }
}
