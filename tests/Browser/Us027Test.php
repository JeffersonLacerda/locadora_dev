<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us027Test extends DuskTestCase
{
    public function testEditUserBtn()
    {
        $this->browse(function (Browser $browser) {
            $user = User::where('email', 'user@teste.com')->first();
            $href = route('user.edit', $user);
            $browser->loginAs(User::find(1))
                    ->visit('/usuario')
                    ->waitForText('Usuários')
                    ->keys("#DataTables_Table_0_filter input", 'user@teste.com', '{enter}')
                    ->click("a[href='$href']")
                    ->waitForText('Modificar Usuário')
                    ->assertPathIs('/usuario/' . $user->id . '/editar');
        });
    }

    public function testEditUserOK()
    {

        $this->browse(function (Browser $browser) {
            $user = User::where('email', 'user@teste.com')->first();
            $browser->loginAs(User::find(1))
                    ->visit(route('user.edit', $user))
                    ->waitForText('Modificar Usuário')
                    ->type('name', 'Usuario Teste Modificado')
                    ->type('email', 'user1@teste.com')
                    ->type('user', 'teste1')
                    ->select('profile', 'Atendimento')
                    ->click('button[type=submit]')
                    ->waitForText('Usuários')
                    ->assertPathIs('/usuario');
        });
        $this->assertDatabaseHas('users',
        [
            'name' => 'Usuario Teste Modificado',
            'email' => 'user1@teste.com',
            'user' => 'teste1',
            'profile' => 'Atendimento',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->logout()
                    ->visit('/')
                    ->clickLink('Área restrita')
                    ->waitForText('Entre para iniciar uma nova sessão')
                    ->type('user', 'teste1')
                    ->type('password', '123456')
                    ->click('button[type=submit]')
                    ->assertPathIs('/locadora')
                    ->assertSeeLink('Locação')
                    ->assertSeeLink('Reserva')
                    ->assertSeeLink('Devolução')
                    ->assertSeeLink('Cliente')
                    ->clickLink('Sair');
        });

        $this->browse(function (Browser $browser) {
            $user = User::where('email', 'user1@teste.com')->first();
            $browser->loginAs(User::find(1))
                    ->visit(route('user.edit', $user))
                    ->waitForText('Modificar Usuário')
                    ->type('name', 'Usuario Teste')
                    ->type('email', 'user@teste.com')
                    ->type('password', '654321')
                    ->type('password_confirmation', '654321')
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

        $this->browse(function (Browser $browser) {
            $browser->logout()
                    ->visit('/')
                    ->clickLink('Área restrita')
                    ->waitForText('Entre para iniciar uma nova sessão')
                    ->type('user', 'teste')
                    ->type('password', '654321')
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

    public function testEditUserFail()
    {
        $this->browse(function (Browser $browser) {
            $user = User::where('email', 'user@teste.com')->first();
            $browser->loginAs(User::find(1))
                    ->visit(route('user.edit', $user))
                    ->waitForText('Modificar Usuário')
                    ->type('name', '')
                    ->type('email', '')
                    ->type('password', '123456')
                    ->type('password_confirmation', '1234567890')
                    ->type('user', '')
                    ->select('profile', 'Administração')
                    ->click('button[type=submit]')
                    ->waitForText('Modificar Usuário')
                    ->assertSee('O campo nome é obrigatório.')
                    ->assertSee('O campo usuário é obrigatório.')
                    ->assertSee('O campo email é obrigatório.')
                    ->assertSee('O campo senha de confirmação não confere.');
        });
        $this->assertDatabaseMissing('users',
        [
            'name' => '',
            'email' => '',
            'user' => '',
            'profile' => 'Administração',
        ]);

    }

    public function testEditUserForbidden()
    {
        $this->browse(function (Browser $browser) {
            $user = User::where('email', 'user@teste.com')->first();
            $browser->loginAs(User::find(2))
                    ->visit(route('user.edit', $user))
                    ->assertSee('Acesso Negado.');
        });
    }
}
