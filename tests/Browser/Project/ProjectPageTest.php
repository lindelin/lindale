<?php

namespace Tests\Browser\Project;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProjectPageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testProjectCreatePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                ->visit('/project')
                ->assertSee('All')
                ->assertSee('Unfinished')
                ->assertSee('Finished')
                ->pause(2000)
                ->click('#add-project-link')
                ->pause(5000)
                ->assertPathIs('/project/create')
                ->assertSee('New Project')
                ->assertSee('Title')
                ->assertSee('About')
                ->assertSee('Start Time')
                ->assertSee('Deadline')
                ->assertSee('Type')
                ->assertSee('Sub Leader')
                ->assertSee('Project Password')
                ->assertSee('Password Confirmation')
                ->assertSee('Image')
                ->type('title', 'Test Project')
                ->type('content', 'TestTest')
                ->type('start_at', '2017-01-01')
                ->type('end_at', '2017-01-31')
                ->type('password', 'TestTest')
                ->type('password_confirmation', 'TestTest')
                ->press('Submit')
                ->pause(2000)
                ->assertSee('Successfully saved.')
                ->assertSee('Test Project')
            ;
        });
    }
}
