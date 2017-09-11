<?php

namespace Tests\Feature\Routes;

use App\User;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeRoutesTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * ユーザモデル.
     *
     * @var
     */
    private $user;


    public function setUp()
    {
        Event::fake();
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_home_page()
    {
        $response = $this->actingAs($this->user)->get('/home');
        $response->assertStatus(200);
        $response->assertViewHasAll(['myProjects', 'userProjects', 'userProjectCount', 'userProgressAreaspline']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_home_project_page()
    {
        $response = $this->actingAs($this->user)->get('/home/project');
        $response->assertStatus(200);
        $response->assertViewHasAll(['myProjects', 'userProjects', 'userProjectCount', 'userProgressAreaspline']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_user_profile_page()
    {
        $response = $this->actingAs($this->user)->get('/profile/1');
        $response->assertStatus(200);
        $response->assertViewHasAll(['userProgressAreaspline', 'user']);
    }
}
