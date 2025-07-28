<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AssettoolsincreateTest extends DuskTestCase
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
                $browser->visit('/asset-in')
                    ->waitFor('@createnewassettoolsin', 3)
                    ->click('@createnewassettoolsin')
                    ->waitForLocation('/asset-in/create', 3)
                    ->type('quantity', 3)
                    ->type('user', 'lala-' . $i) // supaya unik
                    ->press('Save')
                    ->pause(1000)
                    ->waitForLocation('/asset-in', 5)
                    ->pause(1000);
            }
        });
    }
}
