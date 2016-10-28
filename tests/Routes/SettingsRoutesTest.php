<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SettingsRoutesTest extends TestCase
{
    /**
     * ユーザモデル.
     *
     * @var App\User
     */
    private $user;
    /**
     * テストユーザ作成.
     *
     * @before
     * @return void
     */
    public function createUser()
    {
        $this->user = factory(App\User::class)->create();
    }

    /**
     * プライベートルートとしてアクセスできない
     * ルート未定義
     * 404
     *
     * @test
     */
    public function it_can_not_access_the_settings_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/settings');
        $this->assertEquals(404, $response->status());
    }

    /**
     * プライベートルートとしてアクセスできる
     *
     * @test
     */
    public function it_can_access_the_settings_profile_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/settings/profile');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['user', 'mode']);
    }
}
