<?php

declare(strict_types=1);

namespace Poker\HandRankings;

use Poker\Hand;

class StraightFlush implements HandRanking
{
    public function matchesThis(Hand $hand): bool
    {
        if (false === $hand->isThereASequenceOf5()) {
            return false;
        }

        if (false === $hand->areTheCardsOfTheSameSuit()) {
            return false;
        }

        return true;
    }

    public static function getSortingPriorityOfThisRanking(): int
    {
        return 2;
    }
}
