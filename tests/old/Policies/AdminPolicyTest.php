<?php

use App\Policies\AdminPolicy;

class AdminPolicyTest extends BrowserKitTestCase
{
    /**
     * SuperAdminユーザモデル.
     *
     * @var App\User
     */
    private $admin;

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
        $this->admin = \App\User::find(1);
        $this->user = factory(App\User::class)->create();
    }

    /**
     * スーパー管理人認可失敗.
     *
     * @test
     */
    public function testAdminPolicyFalse()
    {
        $this->assertFalse(AdminPolicy::is_super_admin($this->user));
    }

    /**
     * スーパー管理人認可成功.
     *
     * @test
     */
    public function testAdminPolicyTrue()
    {
        $this->assertTrue(AdminPolicy::is_super_admin($this->admin));
    }
}
