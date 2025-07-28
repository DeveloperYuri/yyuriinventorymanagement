<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SparepartcreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::where('email', 'developeryuri2@gmail.com')->first();

            $browser->loginAs($user)
                ->visit('/sparepart')
                ->waitFor('@addsparepart', 3)
                ->click('@addsparepart')
                ->waitForLocation('/spare-parts/create', 3)
                ->attach('image', base_path('tests/Browser/files/dummy.png'))
                ->pause(1000)
                ->type('name', 'Ini Nama Spare Part')
                ->pause(1000)
                ->type('price', 15000)
                ->pause(1000)
                ->press('Save') // ganti sesuai tombol sebenarnya
                ->assertPathIs('/sparepart')
                ->visit('/sparepart')
                ->pause(1000);
        });
    }
}
