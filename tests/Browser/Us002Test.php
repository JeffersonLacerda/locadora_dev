<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us002Test extends DuskTestCase
{

    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function testAddMediaBtn()
    {
        $this->browse(function (Browser $browser) {
            $href = route('media.create');
            $browser->loginAs(User::find(1))
                    ->visit('/midia')
                    ->waitForText('Mídias')
                    ->click("a[href='$href']")
                    ->waitForText('Adicionar Mídia')
                    ->assertPathIs('/midia/adicionar');
        });
    }

    public function testAddMediaOK()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/midia/adicionar')
                    ->type('description', 'Streaming Digital')
                    ->type('rental_price', '8.50')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Mídia')
                    ->assertPathIs('/midia');
        });
        $this->assertDatabaseHas('media', 
        [
            'description' => 'Streaming Digital',
            'rental_price' => 8.5,
        ]);
    }

    public function testAddMediaFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/midia/adicionar')
                    ->waitForText('Adicionar Mídia')
                    ->type('description', '')
                    ->type('rental_price', '')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Mídia')
                    ->assertSee('O campo descrição é obrigatório.')
                    ->assertSee('O campo valor da locação é obrigatório.')
                    ->type('description', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa')
                    ->type('rental_price', '0')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Mídia')
                    ->assertSee('O campo descrição não pode ser superior a 255 caracteres.')
                    ->assertSee('O valor da locação tem que ser maior que 0.')
                    ->type('description', 'Streaming Digital')
                    ->type('rental_price', 'A')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Mídia')
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
            'description' => 'Streaming Digital',
            'rental_price' => 'A',
        ]);
    }

    public function testAddMediaForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/midia/adicionar')
                    ->assertSee('Acesso Negado.');
        });
    }

}
