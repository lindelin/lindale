<?php

namespace App\Repositories;

use ParsedownExtra;

class MarkdownRepository
{
    public static function toHtml($text)
    {
        return (new ParsedownExtra)->text($text);
    }

}