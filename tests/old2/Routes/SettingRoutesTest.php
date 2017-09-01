<?php

namespace Tests\Feature\Routes;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SettingRoutesTest extends TestCase
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
        $this->user = factory(\App\User::class)->create([
            'password' => bcrypt('123456'),
        ]);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_profile_page()
    {
        $response = $this->actingAs($this->user)->get('/settings/profile');
        $response->assertStatus(200);
        $response->assertViewHasAll(['user', 'mode']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_patch_the_profile_page()
    {
        $data = [
            'name' => 'TEST',
        ];
        $response = $this->actingAs($this->user)
            ->patch('/settings/profile/'.$this->user->id, array_merge($data, ['_token' => csrf_token()]));
        $this->assertDatabaseHas('users', $data);
        $response->assertStatus(302);
        $response->assertSessionHas('status');
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_account_page()
    {
        $response = $this->actingAs($this->user)->get('/settings/account');
        $response->assertStatus(200);
        $response->assertViewHasAll(['mode']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_post_the_account_page()
    {
        $data = [
            'password' => '123456',
            'new-password' => '1111111',
            'new-password_confirmation' => '1111111',
        ];
        $response = $this->actingAs($this->user)
            ->post('/settings/account', array_merge($data, ['_token' => csrf_token()]));
        $response->assertStatus(302);
        $response->assertSessionHas('status');
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_oauth_page()
    {
        $response = $this->actingAs($this->user)->get('/settings/oauth/authorized');
        $response->assertStatus(200);
        $response->assertViewHasAll(['mode']);

        $response = $this->actingAs($this->user)->get('/settings/developer/oauth/application');
        $response->assertStatus(200);
        $response->assertViewHasAll(['mode']);

        $response = $this->actingAs($this->user)->get('/settings/developer/oauth/personal');
        $response->assertStatus(200);
        $response->assertViewHasAll(['mode']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_locale_page()
    {
        $response = $this->actingAs($this->user)->get('/settings/locale');
        $response->assertStatus(200);
        $response->assertViewHasAll(['mode']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_patch_the_locale_page()
    {
        $data = [
            'user_lang' => 'ja',
        ];
        $response = $this->actingAs($this->user)
            ->patch('/settings/locale', array_merge($data, ['_token' => csrf_token()]));
        $response->assertStatus(302);
        $response->assertSessionHas('status');
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_notification_page()
    {
        $response = $this->actingAs($this->user)->get('/settings/notification');
        $response->assertStatus(200);
        $response->assertViewHasAll(['mode']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_patch_the_notification_page()
    {
        $data = [
            'slack_api_key' => 'aaaaaaaaaaaaaaaaa',
            'slack_notification' => 'on',
        ];
        $response = $this->actingAs($this->user)
            ->patch('/settings/notification', array_merge($data, ['_token' => csrf_token()]));
        $response->assertStatus(302);
        $response->assertSessionHas('status');
    }
}
