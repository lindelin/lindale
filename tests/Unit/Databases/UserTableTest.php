<?php

namespace Tests\Unit\Databases;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTableTest extends TestCase
{
    /**
     * ユーザテーブルにスーパー管理人のレコードがある.
     *
     * @test
     */
    public function testUserTableHasSuperAdmin()
    {
        $this->assertDatabaseHas('users', [
            'id' => 1,
            'name'   => 'Admin',
            'email'    => 'admin@lindale.tk',
        ]);
    }
}
