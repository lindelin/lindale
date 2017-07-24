<?php

namespace App\Tools\Analytics;

use App\Tools\Analytics\Progresses\MemberProgress;
use App\Tools\Analytics\Progresses\ProjectProgress;
use App\Tools\Analytics\Progresses\UserProgress;

class Calculator
{
    use UserProgress, ProjectProgress, MemberProgress;

    const ZERO = 0;
}
