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

        $previousCard = current($hand->getCardsInTheHand());
        foreach ($hand->getCardsInTheHand() as $card) {
            if ($card->getSuit()->getValue() !== $previousCard->getSuit()->getValue()) {
                return false;
            }
        }

        return true;
    }

    public static function getSortingPriorityOfThisRanking(): int
    {
        return 2;
    }
}
