<?php

namespace Tests\Browser;

use Tests\Browser\Pages\WelcomePage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class WelcomePageTest extends DuskTestCase
{
    /**
     * 歓迎画面テスト.
     *
     * @return void
     */
    public function testWelcomePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new WelcomePage())
                ->clickLink('Login')
                ->assertPathIs('/login');
        });
    }
}
