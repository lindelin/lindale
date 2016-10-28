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

    /**
     * HOMEボタン作動確認
     */
    public function testHomeButton()
    {
        $this->visit('/login')
            ->click('HOME')
            ->seePageIs('/');
    }

    /**
     * 言語切り替えスイッチ作動確認
     */
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

    /**
     * パスワードを忘れた方？リンク作動確認
     */
    public function testForgotYourPasswordLink()
    {
        $this->visit('/login')
            ->click('English')
            ->click('English')
            ->click('Forgot Your Password?')
            ->seePageIs('/password/reset');
    }

    /**
     * ログイン機能確認
     */
    public function testLoginAction()
    {
        $this->visit('/login')
            ->click('English')
            ->click('English')
            ->type('admin@lindale.tk', 'email')
            ->type('123456', 'password')
            ->press('Login')
            ->seePageIs('/home');
    }

    /**
     * ログイン失敗確認
     */
    public function testLoginActionError()
    {
        $this->visit('/login')
            ->click('English')
            ->click('English')
            ->type('admin@lindale.tk', 'email')
            ->type('654321', 'password')
            ->press('Login')
            ->seePageIs('/login')
            ->see('These credentials do not match our records');
    }
}
