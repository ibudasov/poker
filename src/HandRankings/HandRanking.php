<?php

declare(strict_types=1);

namespace Poker\HandRankings;

use Poker\Card;
use Poker\Hand;

interface HandRanking
{
    public function matchesThis(Hand $hand): bool;

    /** @return Card[] */
    public function getMatchedSequence(Hand $hand): array;

    public static function getSortingPriorityOfThisRanking(): int;
}
