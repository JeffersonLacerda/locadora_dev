<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Models\Item;

class Us023Test extends DuskTestCase
{
    public function testEditItemBtn()
    {
        $this->browse(function (Browser $browser) {
            $item = Item::where('serial_number', '09876543211234567890')->first();
            $href = route('item.edit', $item);
            $browser->loginAs(User::find(1))
                    ->visit('/item')
                    ->waitForText('Itens')
                    ->keys("#DataTables_Table_0_filter input", '09876543211234567890', '{enter}')
                    ->click("a[href='$href']")
                    ->waitForText('Modificar Item')
                    ->assertPathIs('/item/' . $item->id . '/editar');
        });
    }

    public function testEditItemOK()
    {

        $this->browse(function (Browser $browser) {
            $item = Item::where('serial_number', '09876543211234567890')->first();
            $browser->loginAs(User::find(1))
                    ->visit(route('item.edit', $item))
                    ->waitForText('Modificar Item')
                    ->type('serial_number', '99999999999999999999')
                    ->type('purchase_date', '01/22/2019')
                    ->click('#select2-movie_id-container')
                    ->keys(".select2-search__field", 'Aquaman', '{enter}')
                    ->click('#select2-media_id-container')
                    ->keys(".select2-search__field", 'HD-DVD', '{enter}')
                    ->click('#select2-distributor_id-container')
                    ->keys(".select2-search__field", 'DVD World', '{enter}')
                    ->click('button[type=submit]')
                    ->waitForText('Itens')
                    ->assertPathIs('/item');
        });
        $this->assertDatabaseHas('items',
        [
            'serial_number' => '99999999999999999999',
            'purchase_date' => '2019-01-22',
            'movie_id' => 1,
            'media_id' => 3,
            'distributor_id' => 8,
        ]);
        $this->browse(function (Browser $browser) {
            $item = Item::where('serial_number', '99999999999999999999')->first();
            $browser->loginAs(User::find(1))
                    ->visit(route('item.edit', $item))
                    ->waitForText('Modificar Item')
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

    public function testEditItemFail()
    {
        $this->browse(function (Browser $browser) {
            $item = Item::where('serial_number', '09876543211234567890')->first();
            $browser->loginAs(User::find(1))
                    ->visit(route('item.edit', $item))
                    ->waitForText('Modificar Item')
                    ->type('serial_number', '')
                    ->type('purchase_date', '')
                    ->click('button[type=submit]')
                    ->waitForText('Modificar Item')
                    ->assertSee('O campo número serial é obrigatório')
                    ->assertSee('O campo data da compra é obrigatório.');
        });
        $this->assertDatabaseMissing('items',
        [
            'serial_number' => '',
            'purchase_date' => '',
        ]);

    }

    public function testEditItemForbidden()
    {
        $this->browse(function (Browser $browser) {
            $item = Item::where('serial_number', '09876543211234567890')->first();
            $browser->loginAs(User::find(2))
                    ->visit(route('item.edit', $item))
                    ->assertSee('Acesso Negado.');
        });
    }
}
