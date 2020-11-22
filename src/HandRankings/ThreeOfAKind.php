<?php

declare(strict_types=1);

namespace Poker\HandRankings;

use function array_count_values;
use function array_search;
use Poker\Hand;

final class ThreeOfAKind implements HandRanking
{
    function matchesThis(Hand $hand): bool
    {
        $ranksWhichAreThereInTheHand = [];

        foreach ($hand->getCardsInTheHand() as $card) {
            $ranksWhichAreThereInTheHand[] = $card->getRank()->getValue();
        }

        $weightedRanks = array_count_values($ranksWhichAreThereInTheHand);

        return false !== array_search(3, $weightedRanks, true);
    }

    static function getSortingPriorityOfThisRanking(): int
    {
        return 7;
    }
}
