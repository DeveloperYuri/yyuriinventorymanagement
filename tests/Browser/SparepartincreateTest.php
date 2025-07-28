<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SparepartincreateTest extends DuskTestCase
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
                $browser->visit('/sparepart-in')
                    ->waitFor('@createsparepartin', 3)
                    ->click('@createsparepartin')
                    ->waitForLocation('/sparepart-in/create', 3)
                    ->select('@sparepartintoggle', (string) $sparePart->id)
                    ->type('quantity', 3)
                    ->type('user', 'lala-' . $i) // supaya unik
                    ->press('Save')
                    ->pause(1000); // beri waktu redirect & simpan
            }
            
        });
    }
}
