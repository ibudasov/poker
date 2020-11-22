<?php

declare(strict_types=1);

namespace Poker\HandRankings;

use Poker\Hand;

final class Flush implements HandRanking
{
    function matchesThis(Hand $hand): bool
    {
        if($hand->areTheCardsOfTheSameSuit() === false) {
            return false;
        }

        if($hand->isThereASequenceOf5()) {
            return false;
        }

        return true;
    }

    static function getSortingPriorityOfThisRanking(): int
    {
        return 5;
    }
}