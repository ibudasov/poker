<?php

declare(strict_types=1);

namespace Poker\HandRankings;

use Poker\Hand;

final class StraightFlush implements HandRanking
{
    function matchesThis(Hand $hand): bool
    {
        if (false === $hand->isThereASequenceOf5()) {
            return false;
        }

        if (false === $hand->areTheCardsOfTheSameSuit()) {
            return false;
        }

        return true;
    }

    static function getSortingPriorityOfThisRanking(): int
    {
        return 2;
    }
}
