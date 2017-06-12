<?php


class UserTableTest extends BrowserKitTestCase
{
    /**
     * ユーザテーブルにスーパー管理人のレコードがある.
     *
     * @test
     */
    public function testUserTableHasSuperAdmin()
    {
        $this->seeInDatabase('users', [
            'id' => 1,
            'name'   => 'Admin',
            'email'    => 'admin@lindale.tk',
        ]);
    }
}
