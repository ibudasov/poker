<?php

declare(strict_types=1);

namespace Poker\HandRankings;

use function current;
use Poker\Hand;
use Poker\Rank;

final class RoyalFlush implements HandRanking
{
    function matchesThis(Hand $hand): bool
    {
        if (false === $hand->isThereASequenceOf5()) {
            return false;
        }

        if (false === $hand->areTheCardsOfTheSameSuit()) {
            return false;
        }

        return current($hand->getCardsInTheHandSortedByRank())
            ->getRank()
            ->equals(Rank::ACE());
    }

    static function getSortingPriorityOfThisRanking(): int
    {
        return 1;
    }
}
