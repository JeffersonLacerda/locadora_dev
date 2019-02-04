<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Models\Client;
use App\Models\Holder;

class Us106Test extends DuskTestCase
{
    public function testActiveClientOK()
    {

        $this->browse(function (Browser $browser) {
            $client = Client::with('holder')->where('email', 'mariajosefadossantos_@arablock.com.br')->first();
            $holder = Holder::findOrFail($client->holder->id);
            $holder->active = FALSE;
            $holder->save();
            $browser->loginAs(User::find(2))
                    ->visit(route('client.edit', $client))
                    ->waitForText('Modificar Cliente')
                    ->click('#active_form')
                    ->waitForText('Modificar Cliente');
        });
        $this->assertDatabaseHas('clients',
        [
            'name' => 'Maria Josefa dos Santos',
            'email' => 'mariajosefadossantos_@arablock.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1969-08-12',
            'type' => 'Titular',
        ]);
        $this->assertDatabaseHas('holders',
        [
            'cpf' => '41687141444',
            'place' => 'Rua Oscar Mariano da Silva',
            'number' => '857',
            'complement' => '',
            'district' => 'Nossa Senhora das Dores',
            'city' => 'Caruaru',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'SUPERMERCADOS BOMPRECO',
            'home_phone' => '8137618652',
            'cell_phone' => '81996249719',
            'work_phone' => '8134989900',
            'client_id' => 1,
            'active' => TRUE,
        ]);

    }
    public function testActiveClientForbidden()
    {
        $this->browse(function (Browser $browser) {
            $client = Client::with('holder')->where('email', 'mariajosefadossantos_@arablock.com.br')->first();
            $browser->loginAs(User::find(1))
                    ->visit(route('client.edit', $client))
                    ->assertSee('Acesso Negado.');
        });
    }
}
