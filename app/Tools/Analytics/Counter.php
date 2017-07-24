<?php

namespace App\Tools\Analytics;

use App\Tools\Analytics\Counters\MemberCounter;
use App\Tools\Analytics\Counters\ProjectCounter;
use App\Tools\Analytics\Counters\UserCounter;

class Counter
{
    use UserCounter, ProjectCounter, MemberCounter;
}
