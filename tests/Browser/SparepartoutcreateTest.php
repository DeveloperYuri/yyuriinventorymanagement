<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SparepartoutcreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::where('email', 'developeryuri2@gmail.com')->first();

            $sparePart = \App\Models\ListSparePartModel::first();

            $browser->loginAs($user);

            for ($i = 1; $i <= 30; $i++) {
                $browser->visit('/sparepart-out')
                    ->waitFor('@createnewsparepartout', 3)
                    ->click('@createnewsparepartout')
                    ->waitForLocation('/sparepart-out/create', 3)
                    // ->select('@sparepartintoggle', (string) $sparePart->id)
                    ->pause(1000) // beri waktu redirect & simpan
                    ->type('quantity', 3)
                    ->pause(1000)
                    ->type('user', 'lala-' . $i) // supaya unik
                    ->pause(1000)
                    ->press('Save')
                    ->pause(1000); // beri waktu redirect & simpan
            }
        });
    }
}
