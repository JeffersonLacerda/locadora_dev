<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us003Test extends DuskTestCase
{

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
            $browser->loginAs(User::find(1))
                    ->visit('/midia/5/editar')
                    ->waitForText('Modificar Mídia')
                    ->type('description', '')
                    ->type('rental_price', '')
                    ->click('button[type=submit]')
                    ->waitForText('Modificar Mídia')
                    ->assertSee('O campo descrição é obrigatório.')
                    ->assertSee('O campo valor da locação é obrigatório.')
                    ->type('description', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa')
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
            'description' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
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
