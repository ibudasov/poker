<?php

declare(strict_types=1);

namespace Poker\HandRankings;

use function array_search;
use Poker\Hand;

final class Pair implements HandRanking
{
    public function matchesThis(Hand $hand): bool
    {
        $ranksWhichAreThereInTheHand = [];

        foreach ($hand->getCardsInTheHand() as $card) {
            if (false !== array_search($card->getRank()->getValue(), $ranksWhichAreThereInTheHand, false)) {
                return true;
            }
            $ranksWhichAreThereInTheHand[] = $card->getRank()->getValue();
        }

        return false;
    }

    public static function getSortingPriorityOfThisRanking(): int
    {
        return 9;
    }
}
