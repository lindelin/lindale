<?php

namespace Tests\Browser\Pages\Home;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class MyHomePage extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/home';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url())
            ->assertSee('My Home')
            ->assertSee('Favorites')
            ->assertSee('My Progress')
            ->assertSee('Projects')
            ->assertSee('Tasks')
            ->assertSee('TODO')
            ->assertSee('Progress')
        ;
    }
}
