<?php

declare(strict_types=1);

namespace Poker\HandRankings;

use function current;
use Poker\Card;
use Poker\Hand;

class HighCard implements HandRanking
{
    public function matchesThis(Hand $hand): bool
    {
        /*
         * In every hand there is a high card, so this this is always true
         */
        return true;
    }

    public function getRankingValueOfThis(Hand $hand): int
    {
        return current($hand->getCardsInTheHandSortedByRank())->getValueOfTheCard();
    }

    public function getMatchedSequence(Hand $hand): array
    {
        return [current($hand->getCardsInTheHandSortedByRank())];
    }
}
