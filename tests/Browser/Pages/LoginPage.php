<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class LoginPage extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/login';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * 言語切り替え
     * @param Browser $browser
     */
    public function lang(Browser $browser)
    {
        $browser->clickLink('English')
            ->assertSee('日本語')
            ->assertSee('中文')
            ->clickLink('日本語')
            ->waitForText('メールアドレス', 5)
            ->assertSee('パスワード')
            ->assertSee('リメンバー・ミー')
            ->assertSee('パスワードを忘れた方？')
            ->assertSee('ログイン')
            ->clickLink('日本語')
            ->clickLink('中文')
            ->assertSee('电子邮件')
            ->assertSee('密码')
            ->assertSee('记住我')
            ->assertSee('忘记密码?')
            ->assertSee('登陆');
    }
}
