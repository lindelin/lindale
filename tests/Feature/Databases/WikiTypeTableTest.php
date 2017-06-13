<?php

namespace Tests\Feature\Databases;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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
