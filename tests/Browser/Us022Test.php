<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Carbon\Carbon;
use App\User;

class Us022Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAddItemBtn()
    {
        $this->browse(function (Browser $browser) {
            $href = route('item.create');
            $browser->loginAs(User::find(1))
                    ->visit('/item')
                    ->waitForText('Itens')
                    ->click("a[href='$href']")
                    ->waitForText('Adicionar Item')
                    ->assertPathIs('/item/adicionar');
        });
    }

   public function testAddItemOK()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/item/adicionar')
                    ->type('serial_number', '09876543211234567890')
                    ->type('purchase_date', '01/17/2019')
                    ->click('#select2-movie_id-container')
                    ->keys(".select2-search__field", 'Aquaman', '{enter}')
                    ->click('#select2-media_id-container')
                    ->keys(".select2-search__field", 'Blu-ray', '{enter}')
                    ->click('#select2-distributor_id-container')
                    ->keys(".select2-search__field", 'Europa Filmes', '{enter}')
                    ->click('button[type=submit]')
                    ->waitForText('Itens')
                    ->assertPathIs('/item');
        });
        $this->assertDatabaseHas('items',
        [
            'serial_number' => '09876543211234567890',
            'purchase_date' => '2019-01-17',
            'movie_id' => 1,
            'media_id' => 4,
            'distributor_id' => 7,
        ]);
    }

    public function testAddItemFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/item/adicionar')
                    ->waitForText('Adicionar Item')
                    ->type('serial_number', '')
                    ->type('purchase_date', '')
                    ->click('button[type=submit]')
                    ->waitForText('Adicionar Item')
                    ->assertSee('O campo número serial é obrigatório')
                    ->assertSee('O campo data da compra é obrigatório.')
                    ->assertSee('O campo filme é obrigatório.')
                    ->assertSee('O campo mídia é obrigatório.')
                    ->assertSee('O campo distribuidora é obrigatório.');
        });
        $this->assertDatabaseMissing('items',
        [
            'serial_number' => '',
            'purchase_date' => '',
            'movie_id' => '',
            'media_id' => '',
            'distributor_id' => '',
        ]);
    }

    public function testAddItemForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/item/adicionar')
                    ->assertSee('Acesso Negado.');
        });
    }
}
