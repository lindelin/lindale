<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectTypeTableTest extends TestCase
{
    /**
     * Projectタイプテーブルにデフォルトデータがある.
     *
     * @test
     */
    public function testProjectTypeTableHasDefault()
    {
        $this->seeInDatabase('project_types', [
            'id' => 1,
            'name' => 'Default',
        ]);
    }
}
