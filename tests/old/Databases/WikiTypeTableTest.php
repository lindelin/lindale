<?php


class WikiTypeTableTest extends BrowserKitTestCase
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
