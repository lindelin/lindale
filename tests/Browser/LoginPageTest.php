<?php

namespace Tests\Browser;

use Tests\Browser\Pages\LoginPage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginPageTest extends DuskTestCase
{
    /**
     * Test Login Page
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage())
                ->assertSee('E-Mail Address')
                ->assertSee('Remember Me')
                ->assertSee('Forgot Your Password?')
                ->assertSee('English')
                ->assertSee('Login')
                ->lang();
            ;
        });
    }

    /**
     * Test Login Page Reset Password Link
     */
    public function testLoginPageResetPasswordLink()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage())
                ->visit('lang/en')
                ->pause(5000)
                ->clickLink('Forgot Your Password?')
                ->assertPathIs('/password/reset')
            ;
        });
    }

    /**
     * ログインテスト
     */
    public function testLoginFunction()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage())
                ->type('email', 'admin@lindelin.org')
                ->type('password', '123456')
                ->pause(2000)
                ->click('#login-button')
                ->assertPathIs('/home')
                ->pause(2000)
                ->click('#user-icon')
                ->click('#logout-link')
                ->pause(2000)
                ->assertPathIs('/')
                ->visit(new LoginPage())
                ->pause(2000)
                ->type('email', 'admin@lindelin.org')
                ->type('password', '123456777')
                ->click('#login-button')
                ->pause(2000)
                ->assertPathIs('/login')
                ->assertSee('These credentials do not match our records.')
            ;
        });
    }
}
