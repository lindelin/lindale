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
     * LOGINリンクテスト
     */
    public function testLoginLink()
    {
        $this->visit('/')
            ->click('Login')
            ->seePageIs('/login');
    }
}
