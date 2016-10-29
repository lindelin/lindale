<?php


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
