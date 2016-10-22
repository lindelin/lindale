<?php

namespace App\Repositories;

use ParsedownExtra;

class MarkdownRepository
{
    /**
     * 将Markdown编译为HTML.
     *
     * @param $text
     * @return mixed|string
     */
    public static function toHtml($text)
    {
        return (new ParsedownExtra)->text($text);
    }
}
