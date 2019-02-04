<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Models\Client;

class Us105Test extends DuskTestCase
{
    public function testDelClientCancel()
    {
        $this->browse(function (Browser $browser) {
            $client = Client::with('holder')->where('email', 'cliente@teste01.com')->first();
            $href = route('client.destroy', $client);
            $browser->loginAs(User::find(2))
                    ->visit('/cliente')
                    ->waitForText('Clientes')
                    ->keys("#DataTables_Table_0_filter input", 'cliente@teste01.com', '{enter}')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover o cliente?')
                    ->click("button[data-dismiss='modal']");
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

    public function testDelClientOK()
    {
        $this->browse(function (Browser $browser) {
            $client = Client::with('holder')->where('email', 'cliente@teste01.com')->first();
            $href = route('client.destroy', $client);
            $browser->loginAs(User::find(2))
                    ->visit('/cliente')
                    ->waitForText('Clientes')
                    ->keys("#DataTables_Table_0_filter input", 'cliente@teste01.com', '{enter}')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover o cliente?')
                    ->click("#delete-btn");
        });

        $this->assertDatabaseMissing('clients',
        [
            'name' => 'Cliente Teste 01',
            'email' => 'cliente@teste01.com',
            'birth_date' => '1980-10-20',
            'gender' => 'Masculino',
            'type' => 'Titular',
        ]);
        $this->assertDatabaseMissing('holders',
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

    public function testDelClientForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/cliente/1/remover')
                    ->assertSee('MethodNotAllowedHttpException');
        });
    }
}
