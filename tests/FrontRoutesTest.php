<?php


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
    public function testAdmin()
    {
        $response = $this->call('GET', '/admin');

        $this->assertEquals(302, $response->status());
    }
}
