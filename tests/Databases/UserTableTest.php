<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTableTest extends TestCase
{
    use DatabaseMigrations;

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
            'password' => bcrypt('123456'),
        ]);
    }
}
