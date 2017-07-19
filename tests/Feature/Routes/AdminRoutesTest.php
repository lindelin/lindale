<?php

namespace Tests\Feature\Routes;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminRoutesTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * ユーザモデル.
     *
     * @var
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
        $this->user = User::find(1);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_profile_page()
    {
        $response = $this->actingAs($this->user)->get('/admin');
        //$response->assertStatus(200);
        $response->assertViewHasAll(['UserChart', 'mode']);

        $response = $this->actingAs($this->user)->get('/admin/user');
        $response->assertStatus(200);
        $response->assertViewHasAll(['users', 'mode']);

        $response = $this->actingAs($this->user)->get('/admin/user/create');
        $response->assertStatus(200);
        $response->assertViewHasAll(['mode']);

        $response = $this->actingAs($this->user)->get('/admin/logs');
        $response->assertStatus(200);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_post_user()
    {
        $data = [
            'email' => 'testtest@lindelin.org',
            'content' => 'TEST',
            'name' => 'TEST USER',
        ];
        $response = $this->actingAs($this->user)
            ->post('/admin/user', array_merge($data, [
                '_token' => csrf_token(),
                'password' => '123456',
                'password_confirmation' => '123456',
            ]));
        $this->assertDatabaseHas('users', $data);
        $response->assertStatus(302);
        $response->assertSessionHas('status');
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_delete_user()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($this->user)
            ->delete('/admin/user/'.$user->id, ['_token' => csrf_token()]);
        $response->assertStatus(302);
        $response->assertSessionHas('status');
    }
}
