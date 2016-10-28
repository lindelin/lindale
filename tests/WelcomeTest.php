<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WelcomeTest extends TestCase
{
    /**
     * 歓迎画面の表示確認
     */
    public function testWelcomeFunctional()
    {
        $this->visit('/')
            ->see('Lindalë')
            ->see('The Project Manager For Everyone')
            ->see('DOCUMENTATION')
            ->see('BLOG')
            ->see('NEWS')
            ->see('ABOUT')
            ->see('GITHUB')
            ->see('LOGIN');
    }

    /**
     * GITHUBリンクテスト
     */
    public function testGitHubLink()
    {
        $this->visit('/')
            ->click('GITHUB')
            ->seePageIs('https://github.com/lindelea/lindale');
    }

    /**
     * LOGINリンクテスト
     */
    public function testLoginLink()
    {
        $this->visit('/')
            ->click('LOGIN')
            ->seePageIs('/login');
    }
}
