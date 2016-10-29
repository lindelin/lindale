<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectStatusTableTest extends TestCase
{
    /**
     * Projectステータステーブルにデフォルトデータがある.
     *
     * @test
     */
    public function testProjectStatusTableHasDefault()
    {
        $this->seeInDatabase('project_statuses', [
            'id' => 1,
            'name' => 'New',
        ]);
    }
}
