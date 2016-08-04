<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FrontRoutesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * Test the response code for the Top page.
     *
     * @return void
     */
    public function testTop()
    {
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->status());
    }

    /**
     * Test the response code for the Posts page.
     *
     * @return void
     */
    public function testAritcle()
    {
        $response = $this->call('GET', '/article/7');

        $this->assertEquals(200, $response->status());
    }

}
