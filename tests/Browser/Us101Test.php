<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class Us101Test extends DuskTestCase
{

    public function setUp(){
        parent::setUp();
        /* \Artisan::call('migrate:fresh');
        \Artisan::call('db:seed'); */
    }

    public function testLoginCustomerServiceFail()
    {

        /* Testar login com usuário inexistente e senha incorreta */
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Área restrita')
                    ->type('user', 'user99')
                    ->type('password', '123456')
                    ->click('button[type=submit]')
                    ->assertPathIs('/entrar')
                    ->assertSee('Essas credenciais não correspondem aos nossos registros.');
        });

        /* Testar login com usuário existente e senha incorreta */
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Área restrita')
                    ->type('user', 'user01')
                    ->type('password', '654321')
                    ->click('button[type=submit]')
                    ->assertPathIs('/entrar')
                    ->assertSee('Essas credenciais não correspondem aos nossos registros.');
        });
    }

    public function testLoginCustomerServiceSucess()
    {
         /* Testar login com usuário existente e senha correta, e o usuário é Atendente */
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Área restrita')
                    ->type('user', 'user01')
                    ->type('password', '123456')
                    ->click('button[type=submit]')
                    ->assertPathIs('/locadora')
                    ->assertSeeLink('Locação')
                    ->assertSeeLink('Reserva')
                    ->assertSeeLink('Devolução')
                    ->assertSeeLink('Cliente')
                    ->clickLink('Sair');
        });

    }

    public function testLoginNotCustomerServiceSucess()
    {
        /* Testar login com usuário existente e senha correta, e o usuário não é um Atendente */
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Área restrita')
                    ->type('user', 'admin')
                    ->type('password', '123456')
                    ->click('button[type=submit]')
                    ->assertPathIs('/locadora')
                    ->assertDontSeeLink('Locação')
                    ->assertDontSeeLink('Reserva')
                    ->assertDontSeeLink('Devolução')
                    ->assertDontSeeLink('Cliente')
                    ->clickLink('Sair');
        });
    }
}
