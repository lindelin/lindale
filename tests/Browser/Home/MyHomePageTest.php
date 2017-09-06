<?php

namespace Tests\Browser\Home;

use App\User;
use Tests\Browser\Pages\Home\MyHomePage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MyHomePageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testMyHomePage()
    {

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                ->visit(new MyHomePage())
                ->assertSee('TestUser1')
                ->assertSee('user1@lindelin.org')
                ->clickLink('Edit Profile')
                ->pause(2000)
                ->assertPathIs('/settings/profile')
                ->pause(2000)
                ->visit(new MyHomePage())
                ->pause(2000)
                ->clickLink('My Projects')
                ->pause(2000)
                ->assertPathIs('/home/project')
                ->assertSee('You don\'t have any projects yet.')
            ;
        });
    }
}
