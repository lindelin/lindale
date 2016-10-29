<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
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
        $this->seeInDatabase('wiki_types', [
            'id' => '1',
            'name' => 'wiki',
        ]);
    }
}
