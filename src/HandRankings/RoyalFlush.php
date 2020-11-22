<?php

declare(strict_types=1);

namespace Poker\HandRankings;

use function current;
use Poker\Hand;
use Poker\Rank;

class RoyalFlush implements HandRanking
{
    public function matchesThis(Hand $hand): bool
    {
        if (false === $hand->isThereASequenceOf5()) {
            return false;
        }

        $previousCard = current($hand->getCardsInTheHand());
        foreach ($hand->getCardsInTheHand() as $card) {
            if ($card->getSuit()->getValue() !== $previousCard->getSuit()->getValue()) {
                return false;
            }
        }

        return current($hand->getCardsInTheHandSortedByRank())
            ->getRank()
            ->equals(Rank::ACE());
    }

    public static function getSortingPriorityOfThisRanking(): int
    {
        return 1;
    }
}
