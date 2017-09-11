<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class WelcomePage extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/';
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
            ->assertSee('About')
            ->assertSee('Document')
            ->assertSee('News')
            ->assertSee('GitHub')
            ->assertSee('Blog')
            ->assertSee('Login')
            ->assertSee('The Project Manager For Everyone.')
            ->assertSee('Lindalë');
    }
}
