<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminRoutesTest extends TestCase
{
    use DatabaseMigrations;

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
        $this->user = \App\User::find(1);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_admin_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/admin');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['mode']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_admin_user_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/admin/user');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['mode', 'users']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_admin_user_create_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/admin/user/create');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['mode']);
    }
}
