<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class Us029Test extends DuskTestCase
{
    public function testDelUserCancel()
    {
        $this->browse(function (Browser $browser) {
            $user = User::where('email', 'user@teste.com')->first();
            $href = route('user.destroy', $user);
            $browser->loginAs(User::find(1))
                    ->visit('/usuario')
                    ->waitForText('Usuários')
                    ->keys("#DataTables_Table_0_filter input", 'user@teste.com', '{enter}')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover esse usuário?')
                    ->click("button[data-dismiss='modal']");
        });

        $this->assertDatabaseHas('users',
        [
            'name' => 'Usuario Teste',
            'email' => 'user@teste.com',
            'user' => 'teste',
            'profile' => 'Administração',
        ]);
    }

    public function testDelUserOK()
    {
        $this->browse(function (Browser $browser) {
            $user = User::where('email', 'user@teste.com')->first();
            $href = route('user.destroy', $user);
            $browser->loginAs(User::find(1))
                    ->visit('/usuario')
                    ->waitForText('Usuários')
                    ->keys("#DataTables_Table_0_filter input", 'user@teste.com', '{enter}')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover esse usuário?')
                    ->click("#delete-btn");
        });

        $this->assertDatabaseMissing('users',
        [
            'name' => 'Usuario Teste',
            'email' => 'user@teste.com',
            'user' => 'teste',
            'profile' => 'Administração',
        ]);
    }

    public function testDelUserForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/usuario/1/remover')
                    ->assertSee('MethodNotAllowedHttpException');
        });
    }
}
