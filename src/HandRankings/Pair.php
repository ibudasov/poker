<?php

declare(strict_types=1);

namespace Poker\HandRankings;

use function array_search;
use Poker\Hand;

class Pair implements HandRanking
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

    public function getMatchedSequence(Hand $hand): array
    {
        throw new \Exception('❗️ getMatchedSequence() needs to be implemented');
    }

    public static function getSortingPriorityOfThisRanking(): int
    {
        return 9;
    }
}
