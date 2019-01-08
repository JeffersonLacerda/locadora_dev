<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us001Test extends DuskTestCase
{

    public function setUp(){
        parent::setUp();
       /*  \Artisan::call('migrate:fresh');
        \Artisan::call('db:seed'); */
    }

    public function testLoginAdminFail()
    {
        /* Testar login com usuário inexistente e senha incorreta */
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Área restrita')
                    ->type('user', 'root')
                    ->type('password', '123456')
                    ->click('button[type=submit]')
                    ->assertPathIs('/entrar')
                    ->assertSee('Essas credenciais não correspondem aos nossos registros.');
        });

        /* Testar login com usuário existente e senha incorreta */
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Área restrita')
                    ->type('user', 'admin')
                    ->type('password', '654321')
                    ->click('button[type=submit]')
                    ->assertPathIs('/entrar')
                    ->assertSee('Essas credenciais não correspondem aos nossos registros.');
        });
    }

    public function testLoginAdminSucess()
    {
         /* Testar login com usuário existente e senha correta, e o usuário é Administrador */
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Área restrita')
                    ->type('user', 'admin')
                    ->type('password', '123456')
                    ->click('button[type=submit]')
                    ->assertPathIs('/locadora')
                    ->assertSeeLink('Gênero')
                    ->assertSeeLink('Tipo')
                    ->assertSeeLink('Mídia')
                    ->assertSeeLink('Distribuidora')
                    ->assertSeeLink('Filme')
                    ->assertSeeLink('Item')
                    ->assertSeeLink('Usuário')
                    ->clickLink('Sair');
        });

    }

    public function testLoginNotAdminSucess()
    {
        /* Testar login com usuário existente e senha correta, e o usuário não é um administrador */
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Área restrita')
                    ->type('user', 'user01')
                    ->type('password', '123456')
                    ->click('button[type=submit]')
                    ->assertPathIs('/locadora')
                    ->assertDontSeeLink('Gênero')
                    ->assertDontSeeLink('Tipo')
                    ->assertDontSeeLink('Mídia')
                    ->assertDontSeeLink('Distribuidora')
                    ->assertDontSeeLink('Filme')
                    ->assertDontSeeLink('Item')
                    ->assertDontSeeLink('Usuário')
                    ->clickLink('Sair');
        });
    }

}
