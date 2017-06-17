<?php

namespace Tests\Feature\Databases;

use Tests\TestCase;

class WikiTypeTableTest extends TestCase
{
    /**
     * Wiki索引テーブルにデフォルトデータがある.
     *
     * @test
     */
    public function testWikiTypeTableHasDefault()
    {
        $this->assertDatabaseHas('wiki_types', [
            'id' => '1',
            'name' => 'wiki',
        ]);
    }
}
