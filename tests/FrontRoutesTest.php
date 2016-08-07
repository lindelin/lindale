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
     * Test the response code for the Admin page.
     *
     * @return void
     */
    public function testAdmin()
    {
        $response = $this->call('GET', '/admin/index');

        $this->assertEquals(302, $response->status());
    }

    /**
     * Test the response code for the Admin's Article page.
     *
     * @return void
     */
    public function testAdminArticle()
    {
        $response = $this->call('GET', '/admin/article');

        $this->assertEquals(302, $response->status());
    }

    /**
     * Test the response code for the Admin's Comment page.
     *
     * @return void
     */
    public function testAdminComment()
    {
        $response = $this->call('GET', '/admin/comment');

        $this->assertEquals(302, $response->status());
    }

    /**
     * Test the response code for the Admin's User page.
     *
     * @return void
     */
    public function testAdminUser()
    {
        $response = $this->call('GET', '/admin/user');

        $this->assertEquals(302, $response->status());
    }

    /**
     * Test the response code for the Admin's AddUser page.
     *
     * @return void
     */
    public function testAdminAddUserPost()
    {
        $response = $this->call('POST', '/admin/adduser');

        $this->assertEquals(302, $response->status());
    }

    /**
     * Test the response code for the Admin's AddUser page.
     *
     * @return void
     */
    public function testAdminAddUserGet()
    {
        $response = $this->call('GET', '/admin/adduser');

        $this->assertEquals(405, $response->status());
    }
}
