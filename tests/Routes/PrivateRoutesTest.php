<?php


class PrivateRoutesTest extends TestCase
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
    public function createTestData()
    {
        $this->user = factory(App\User::class)->create();
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_home_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/home');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['mode', 'myProjects', 'userProjectCount', 'userProjects']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_project_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['projects']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_settings_profile_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/settings/profile');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['user', 'mode']);
    }

    /**
     * プライベートルートとしてアクセスできる
     * 権限不足で403ページへ遷移する.
     *
     * @test
     */
    public function it_can_not_access_the_admin_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/admin');
        $this->assertEquals(403, $response->status());
    }
}
