<?php

declare(strict_types=1);

namespace Poker\HandRankings;

use function array_count_values;
use function array_search;
use Poker\Hand;

class FullHouse implements HandRanking
{
    public function matchesThis(Hand $hand): bool
    {
        $ranksWhichAreThereInTheHand = [];

        foreach ($hand->getCardsInTheHand() as $card) {
            $ranksWhichAreThereInTheHand[] = $card->getRank()->getValue();
        }

        $weightedRanks = array_count_values($ranksWhichAreThereInTheHand);

        return false !== array_search(3, $weightedRanks, true) &&
            false !== array_search(2, $weightedRanks, true);
    }

    public function getMatchedSequence(Hand $hand): array
    {
        throw new \Exception('❗️ getMatchedSequence() needs to be implemented');
    }

    public static function getSortingPriorityOfThisRanking(): int
    {
        return 4;
    }
}
