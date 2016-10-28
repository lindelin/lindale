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
            ->click('<span class="glyphicon glyphicon-home"></span>')
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
             ->see('ログイン');

    }
}
