<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AssettoolscreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::where('email', 'developeryuri2@gmail.com')->first();

            $browser->loginAs($user);
            for ($i = 1; $i <= 100; $i++) {
                $browser->visit('/Assettools')
                    ->waitFor('@addassettools', 3)
                    ->click('@addassettools')
                    ->waitForLocation('/asset-tools/create', 3)
                    ->attach('image', base_path('tests/Browser/files/dummy.png'))
                    ->pause(1000)
                    ->type('name', 'Ini Nama Spare Part')
                    ->pause(1000)
                    ->type('price', 15000)
                    ->pause(1000)
                    ->press('Save') // ganti sesuai tombol sebenarnya
                    ->waitForLocation('/Assettools', 5)
                    ->pause(1000);
            }
        });
    }
}
