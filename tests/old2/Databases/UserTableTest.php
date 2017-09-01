<?php

namespace Tests\Feature\Databases;

use Tests\TestCase;

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
            'email'    => 'admin@lindelin.org',
        ]);
    }
}
