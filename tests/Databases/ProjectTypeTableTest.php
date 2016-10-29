<?php


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
