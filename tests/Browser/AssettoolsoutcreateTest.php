<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AssettoolsoutcreateTest extends DuskTestCase
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
                $browser->visit('/asset-out')
                    ->waitFor('@createnewassettoolsout', 3)
                    ->click('@createnewassettoolsout')
                    ->waitForLocation('/asset-out/create', 3)
                    ->type('quantity', 3)
                    ->type('user', 'lala-' . $i) // supaya unik
                    ->press('Save')
                    ->pause(1000)
                    ->waitForLocation('/asset-out', 5)
                    ->pause(1000);
            }
        });
    }
}
