<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Models\Item;

class Us025Test extends DuskTestCase
{
    public function testDelItemCancel()
    {
        $this->browse(function (Browser $browser) {
            $item = Item::where('serial_number', '09876543211234567890')->first();
            $href = route('item.destroy', $item);
            $browser->loginAs(User::find(1))
                    ->visit('/item')
                    ->waitForText('Itens')
                    ->keys("#DataTables_Table_0_filter input", '09876543211234567890', '{enter}')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover o item?')
                    ->click("button[data-dismiss='modal']");
        });

        $this->assertDatabaseHas('items',
        [
            'serial_number' => '09876543211234567890',
        ]);
    }

    public function testDelItemOK()
    {
        $this->browse(function (Browser $browser) {
            $item = Item::where('serial_number', '09876543211234567890')->first();
            $href = route('item.destroy', $item);
            $browser->loginAs(User::find(1))
                    ->visit('/item')
                    ->waitForText('Itens')
                    ->keys("#DataTables_Table_0_filter input", '09876543211234567890', '{enter}')
                    ->click("form[action='$href'] button[type='submit']")
                    ->waitForText('Remover o item?')
                    ->click("#delete-btn");
        });

        $this->assertDatabaseMissing('items',
        [
            'serial_number' => '09876543211234567890',
        ]);
    }

    public function testDelItemForbidden()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                    ->visit('/item/1/remover')
                    ->assertSee('MethodNotAllowedHttpException');
        });
    }
}
