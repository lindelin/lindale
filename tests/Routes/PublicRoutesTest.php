<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PublicRoutesTest extends TestCase
{
    /**
     * 公開ルートとしてアクセスできる
     *
     * @test
     */
    public function it_can_access_the_index_page()
    {
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());
    }

    /**
     * 公開ルートとしてアクセスできる
     *
     * @test
     */
    public function it_can_access_the_login_page()
    {
        $response = $this->call('GET', '/login');
        $this->assertEquals(200, $response->status());
    }

    /**
     * 公開ルートとしてアクセスできる
     *
     * @test
     */
    public function it_can_access_the_password_reset_page()
    {
        $response = $this->call('GET', '/password/reset');
        $this->assertEquals(200, $response->status());
    }

    /**
     * 公開ルートとしてアクセスできる
     * リダイレクトされる
     *
     * @test
     */
    public function it_can_change_language_to_ja()
    {
        $response = $this->call('GET', '/lang/ja');
        $this->assertEquals(302, $response->status());
        $this->assertSessionHas('lang', 'ja');
    }

    /**
     * 公開ルートとしてアクセスできる
     * リダイレクトされる
     *
     * @test
     */
    public function it_can_change_language_to_zh()
    {
        $response = $this->call('GET', '/lang/zh');
        $this->assertEquals(302, $response->status());
        $this->assertSessionHas('lang', 'zh');
    }

    /**
     * 公開ルートとしてアクセスできる
     * リダイレクトされる
     *
     * @test
     */
    public function it_can_change_language_to_en()
    {
        $response = $this->call('GET', '/lang/en');
        $this->assertEquals(302, $response->status());
        $this->assertSessionHas('lang', 'en');
    }

    /**
     * 公開ルートとしてアクセスできない
     * ログインページにリダイレクトされる
     *
     * @test
     */
    public function it_can_not_access_home_page()
    {
        $response = $this->call('GET', '/home');
        $this->assertEquals(302, $response->status());
    }

    /**
     * 公開ルートとしてアクセスできる
     * リダイレクトされる
     *
     * @test
     */
    public function it_can_not_access_project_page()
    {
        $response = $this->call('GET', '/project');
        $this->assertEquals(302, $response->status());
    }

    /**
     * 公開ルートとしてアクセスでき
     * 404ページを見せる
     *
     * @test
     */
    public function it_can_not_access_settings_page()
    {
        $response = $this->call('GET', '/settings');
        $this->assertEquals(404, $response->status());
    }

    /**
     * 公開ルートとしてアクセスできる
     * リダイレクトされる
     *
     * @test
     */
    public function it_can_not_access_admin_page()
    {
        $response = $this->call('GET', '/admin');
        $this->assertEquals(302, $response->status());
    }

    /**
     * ルートとしてアクセスできる
     * 404ページを見せる
     *
     * @test
     */
    public function it_can_access_404_page()
    {
        $response = $this->call('GET', '/404');
        $this->assertEquals(404, $response->status());

        $this->see('404');
    }
}
