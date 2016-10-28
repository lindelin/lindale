<?php


class HomeRoutesTest extends TestCase
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
    public function it_can_access_the_home_project_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/home/project');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['mode', 'myProjects', 'userProjectCount', 'userProjects']);
    }
}
