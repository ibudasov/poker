<?php

declare(strict_types=1);

namespace Poker\HandRankings;

use Poker\Card;
use Poker\Hand;

interface HandRanking
{
    public function matchesThis(Hand $hand): bool;

    public static function getSortingPriorityOfThisRanking(): int;
}
