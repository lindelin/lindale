<?php

namespace App\Tools\Analytics;

use App\Tools\Analytics\Counters\UserCounter;
use App\Tools\Analytics\Counters\MemberCounter;
use App\Tools\Analytics\Counters\ProjectCounter;

class Counter
{
    use UserCounter, ProjectCounter, MemberCounter;
}
