<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us026Test extends DuskTestCase
{
    public function testAddUserBtn()
    {
        $this->browse(function (Browser $browser) {
            $href = route('user.create');
            $browser->loginAs(User::find(1))
                    ->visit('/usuario')
                    ->waitForText('Usuários')
                    ->click("a[href='$href']")
                    ->waitForText('Adicionar Usuário')
                    ->assertPathIs('/usuario/adicionar');
        });
    }

    public function testAddUserOK()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/usuario/adicionar')
                    ->type('name', 'Usuario Teste')
                    ->type('email', 'user@teste.com')
                    ->type('password', '123456')
                    ->type('password_confirmation', '123456')
                    ->type('user', 'teste')
                    ->select('profile', 'Administração')
                    ->click('button[type=submit]')
                    ->waitForText('Usuários')
                    ->assertPathIs('/usuario');
        });
        $this->assertDatabaseHas('users',
        [
            'name' => 'Usuario Teste',
            'email' => 'user@teste.com',
            'user' => 'teste',
            'profile' => 'Administração',
        ]);
    }

    public function testLoginUser()
    {
         /* Testar login com usuário existente e senha correta, e o usuário é Administrador */
         $this->browse(function (Browser $browser) {
            $browser->logout()
                    ->visit('/')
                    ->clickLink('Área restrita')
                    ->waitForText('Entre para iniciar uma nova sessão')
                    ->type('user', 'teste')
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

    public function testAddUserFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/usuario/adicionar')
                    ->waitForText('Adicionar Usuário')
                    ->type('name', '')
                    ->type('email', '')
                    ->type('password', '')
                    ->type('password_confirmation', '')
                    ->type('user', '')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Usuário')
                    ->assertSee('O campo nome é obrigatório.')
                    ->assertSee('O campo usuário é obrigatório.')
                    ->assertSee('O campo email é obrigatório.')
                    ->assertSee('O campo senha é obrigatório.')
                    ->assertSee('O campo perfil é obrigatório.')
                    ->type('name', '')
                    ->type('email', 'user@teste.com')
                    ->type('password', '')
                    ->type('password_confirmation', '')
                    ->type('user', 'teste')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Usuário')
                    ->assertSee('O campo nome é obrigatório.')
                    ->assertSee('O campo usuário já está sendo utilizado.')
                    ->assertSee('O campo email já está sendo utilizado.')
                    ->assertSee('O campo senha é obrigatório.')
                    ->assertSee('O campo perfil é obrigatório.')
                    ->type('name', 'Teste de senha')
                    ->type('email', 'user@teste.com')
                    ->type('password', '123456')
                    ->type('password_confirmation', '654321')
                    ->type('user', 'teste')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Usuário')
                    ->assertSee('O campo usuário já está sendo utilizado.')
                    ->assertSee('O campo email já está sendo utilizado.')
                    ->assertSee('O campo senha de confirmação não confere.')
                    ->assertSee('O campo perfil é obrigatório.');
        });
        $this->assertDatabaseMissing('users',
        [
            'name' => '',
            'email' => '',
            'user' => '',
            'profile' => '',
        ]);
        $this->assertDatabaseMissing('users',
        [
            'name' => '',
            'email' => 'user@teste.com',
            'user' => 'teste',
            'profile' => '',
        ]);
    }

    public function testAddUserForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/usuario/adicionar')
                    ->assertSee('Acesso Negado.');
        });
    }
}
