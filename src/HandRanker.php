<?php

declare(strict_types=1);

namespace Poker;

use LogicException;
use Poker\HandRankings\FourOfAKind;
use Poker\HandRankings\FullHouse;
use Poker\HandRankings\HandRanking;
use Poker\HandRankings\HighCard;
use Poker\HandRankings\Pair;
use Poker\HandRankings\RoyalFlush;
use Poker\HandRankings\StraightFlush;
use Poker\HandRankings\ThreeOfAKind;
use function ksort;

class HandRanker
{
    /** @return HandRanking[] */
    private function getPrioritizedListOfRankings(): array
    {
        $list[FullHouse::getSortingPriorityOfThisRanking()] = new FullHouse();
        $list[ThreeOfAKind::getSortingPriorityOfThisRanking()] = new ThreeOfAKind();
        $list[Pair::getSortingPriorityOfThisRanking()] = new Pair();
        $list[HighCard::getSortingPriorityOfThisRanking()] = new HighCard();
        $list[FourOfAKind::getSortingPriorityOfThisRanking()] = new FourOfAKind();
        $list[StraightFlush::getSortingPriorityOfThisRanking()] = new StraightFlush();
        $list[RoyalFlush::getSortingPriorityOfThisRanking()] = new RoyalFlush();

        ksort($list);

        return $list;
    }

    public function rankTheHand(Hand $hand): int
    {
        foreach ($this->getPrioritizedListOfRankings() as $handRanking) {
            if ($handRanking->matchesThis($hand)) {
                return $handRanking::getSortingPriorityOfThisRanking();
            }
        }

        throw new LogicException('We could not determine the rank of the hand, it seems to be a programming mistake');
    }
}
