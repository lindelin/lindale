<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * 歓迎画面の表示確認
     */
    public function testWelcomeFunctional()
    {
        $this->visit('/login')
            ->see('Lindalë')
            ->see('HOME')
            ->see('Login')
            ->see('E-Mail Address')
            ->see('Password')
            ->see('Remember Me')
            ->see('English')
            ->see('Forgot Your Password');
    }

    public function testHomeButton()
    {
        $this->visit('/login')
            ->click('HOME')
            ->seePageIs('/');
    }

    public function testLangButton()
    {
        $this->visit('/login')
            ->click('English')
            ->see('English')
            ->see('日本語')
            ->see('中文');

        $this->click('日本語')
            ->see('日本語')
            ->see('ログイン');

        $this->click('日本語')
            ->click('中文')
            ->see('登陆');

    }

    public function testForgotYourPasswordLink()
    {
        $this->visit('/login')
            ->click('English')
            ->click('English')
            ->click('Forgot Your Password?')
            ->seePageIs('/password/reset');
    }

    public function testLoginAction()
    {
        $this->visit('/login')
            ->type('admin@lindale.tk', 'email')
            ->type('123456', 'password')
            ->press('Login')
            ->seePageIs('/home');
    }
}
