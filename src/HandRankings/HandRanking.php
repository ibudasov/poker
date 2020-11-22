<?php

declare(strict_types=1);

namespace Poker\HandRankings;

use Poker\Hand;

interface HandRanking
{
    function matchesThis(Hand $hand): bool;

    static function getSortingPriorityOfThisRanking(): int;
}
