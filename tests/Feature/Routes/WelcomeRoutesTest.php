<?php

namespace Tests\Feature\Routes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WelcomeRoutesTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * ε
     * ¬ιγ«γΌγγ¨γγ¦γ’γ―γ»γΉγ§γγ.
     *
     * @test
     */
    public function it_can_access_the_index_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * ε
     * ¬ιγ«γΌγγ¨γγ¦γ’γ―γ»γΉγ§γγ.
     *
     * @test
     */
    public function it_can_access_the_login_page()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    /**
     * ε
     * ¬ιγ«γΌγγ¨γγ¦γ’γ―γ»γΉγ§γγ.
     *
     * @test
     */
    public function it_can_access_the_password_reset_page()
    {
        $response = $this->get('/password/reset');
        $response->assertStatus(200);
    }

    /**
     * ε
     * ¬ιγ«γΌγγ¨γγ¦γ’γ―γ»γΉγ§γγ
     * γͺγγ€γ¬γ―γγγγ.
     *
     * @test
     */
    public function it_can_change_language_to_ja()
    {
        $response = $this->get('/lang/ja');
        $response->assertStatus(302);
        $response->assertSessionHas('lang_guest', 'ja');
    }

    /**
     * ε
     * ¬ιγ«γΌγγ¨γγ¦γ’γ―γ»γΉγ§γγ
     * γͺγγ€γ¬γ―γγγγ.
     *
     * @test
     */
    public function it_can_change_language_to_zh()
    {
        $response = $this->get('/lang/zh');
        $response->assertStatus(302);
        $response->assertSessionHas('lang_guest', 'zh');
    }

    /**
     * ε
     * ¬ιγ«γΌγγ¨γγ¦γ’γ―γ»γΉγ§γγ
     * γͺγγ€γ¬γ―γγγγ.
     *
     * @test
     */
    public function it_can_change_language_to_en()
    {
        $response = $this->get('/lang/en');
        $response->assertStatus(302);
        $response->assertSessionHas('lang_guest', 'en');
    }

    /**
     * ε
     * ¬ιγ«γΌγγ¨γγ¦γ’γ―γ»γΉγ§γ
     * 404γγΌγΈγθ¦γγ.
     *
     * @test
     */
    public function it_can_not_access_settings_page()
    {
        $response = $this->get('/settings');
        $response->assertStatus(404);
    }

    /**
     * ε
     * ¬ιγ«γΌγγ¨γγ¦γ’γ―γ»γΉγ§γγ
     * γͺγγ€γ¬γ―γγγγ.
     *
     * @test
     */
    public function it_can_not_access_admin_page()
    {
        $response = $this->get('/admin');
        $response->assertStatus(302);

        $response = $this->get('/task');
        $response->assertStatus(302);

        $response = $this->get('/todo');
        $response->assertStatus(302);

        $response = $this->get('/home');
        $response->assertStatus(302);

        $response = $this->get('/project');
        $response->assertStatus(302);
    }

    /**
     * γ«γΌγγ¨γγ¦γ’γ―γ»γΉγ§γγ
     * 404γγΌγΈγθ¦γγ.
     *
     * @test
     */
    public function it_can_access_404_page()
    {
        $response = $this->get('/404');
        $response->assertStatus(404);
    }
}
