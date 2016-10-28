<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PublicRoutesTest extends TestCase
{
    /**
     * 公開ルートとしてアクセスできる
     */
    public function it_can_access_the_index_page()
    {
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());
    }

    /**
     * 公開ルートとしてアクセスできる
     */
    public function it_can_access_the_login_page()
    {
        $response = $this->call('GET', '/login');
        $this->assertEquals(200, $response->status());
    }

    /**
     * 公開ルートとしてアクセスできる
     */
    public function it_can_access_the_password_reset_page()
    {
        $response = $this->call('GET', '/password/reset');
        $this->assertEquals(200, $response->status());
    }

    /**
     * 公開ルートとしてアクセスできる
     * リダイレクトされる
     */
    public function it_can_change_language_to_ja()
    {
        $response = $this->call('GET', '/lang/ja');
        $this->assertEquals(304, $response->status());

        $this->see('ログイン');
    }

    /**
     * 公開ルートとしてアクセスできる
     * リダイレクトされる
     */
    public function it_can_change_language_to_zh()
    {
        $response = $this->call('GET', '/lang/zh');
        $this->assertEquals(304, $response->status());

        $this->see('登陆');
    }

    /**
     * 公開ルートとしてアクセスできる
     * リダイレクトされる
     */
    public function it_can_change_language_to_en()
    {
        $response = $this->call('GET', '/lang/en');
        $this->assertEquals(304, $response->status());

        $this->see('Login');
    }

    /**
     * 公開ルートとしてアクセスできない
     * ログインページにリダイレクトされる
     */
    public function it_can_not_access_home_page()
    {
        $response = $this->call('GET', '/home');
        $this->assertEquals(304, $response->status());
    }

    /**
     * 公開ルートとしてアクセスできる
     * リダイレクトされる
     */
    public function it_can_not_access_project_page()
    {
        $response = $this->call('GET', '/project');
        $this->assertEquals(304, $response->status());
    }

    /**
     * 公開ルートとしてアクセスできる
     * リダイレクトされる
     */
    public function it_can_not_access_settings_page()
    {
        $response = $this->call('GET', '/settings');
        $this->assertEquals(304, $response->status());
    }

    /**
     * 公開ルートとしてアクセスできる
     * リダイレクトされる
     */
    public function it_can_not_access_admin_page()
    {
        $response = $this->call('GET', '/admin');
        $this->assertEquals(304, $response->status());
    }

    /**
     * ルートとしてアクセスできる
     * 404ページを見せる
     */
    public function it_can_access_404_page()
    {
        $response = $this->call('GET', '/404');
        $this->assertEquals(404, $response->status());

        $this->see('404');
    }
}
