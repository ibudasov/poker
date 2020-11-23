<?php

declare(strict_types=1);

namespace Poker\HandRankings;

use function array_count_values;
use function array_keys;
use function array_search;
use Poker\Hand;

final class TwoPair implements HandRanking
{
    function matchesThis(Hand $hand): bool
    {
        $ranksWhichAreThereInTheHand = [];

        foreach ($hand->getCardsInTheHand() as $card) {
            $ranksWhichAreThereInTheHand[] = $card->getRank()->getValue();
        }

        $weightedRanks = array_count_values($ranksWhichAreThereInTheHand);

        $pairOfCards = 2;
        $thereAreTwoPairs = count(array_keys($weightedRanks, $pairOfCards)) === 2;

        return $thereAreTwoPairs;
    }

    static function getSortingPriorityOfThisRanking(): int
    {
        return 8;
    }
}
