<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PrivateRoutesTest extends TestCase
{
    use InteractsWithDatabase;
    /**
     * The user model.
     *
     * @var App\User
     */
    private $user;
    /**
     * Create the user model test subject.
     *
     * @before
     * @return void
     */
    public function createUser()
    {
        $this->user = factory(App\User::class)->create();
    }

    /**
     * プライベートルートとしてアクセスできる
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
     * プライベートルートとしてアクセスできる
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
