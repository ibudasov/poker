<?php

declare(strict_types=1);

namespace Poker;

use Poker\HandRankings\TwoPair;
use function array_multisort;
use function ksort;
use LogicException;
use Poker\HandRankings\Flush;
use Poker\HandRankings\FourOfAKind;
use Poker\HandRankings\FullHouse;
use Poker\HandRankings\HandRanking;
use Poker\HandRankings\HighCard;
use Poker\HandRankings\Pair;
use Poker\HandRankings\RoyalFlush;
use Poker\HandRankings\StraightFlush;
use Poker\HandRankings\ThreeOfAKind;
use function serialize;
use function unserialize;
use const SORT_ASC;
use const SORT_DESC;

final class HandRanker
{
    /** @return HandRanking[] */
    private function getPrioritizedListOfRankings(): array
    {
        $list = [
            FullHouse::getSortingPriorityOfThisRanking() => new FullHouse(),
            ThreeOfAKind::getSortingPriorityOfThisRanking() => new ThreeOfAKind(),
            Pair::getSortingPriorityOfThisRanking() => new Pair(),
            HighCard::getSortingPriorityOfThisRanking() => new HighCard(),
            FourOfAKind::getSortingPriorityOfThisRanking() => new FourOfAKind(),
            StraightFlush::getSortingPriorityOfThisRanking() => new StraightFlush(),
            RoyalFlush::getSortingPriorityOfThisRanking() => new RoyalFlush(),
            Flush::getSortingPriorityOfThisRanking() => new Flush(),
            TwoPair::getSortingPriorityOfThisRanking() => new TwoPair(),
        ];

        ksort($list);

        return $list;
    }

    function rankTheHand(Hand $hand): int
    {
        foreach ($this->getPrioritizedListOfRankings() as $handRanking) {
            if ($handRanking->matchesThis($hand)) {
                return $handRanking::getSortingPriorityOfThisRanking();
            }
        }

        throw new LogicException('We could not determine the rank of the hand, it seems to be a programming mistake');
    }

    /** @return Hand[] sorted array of hands */
    function rankMultipleHands(Hand ...$hands): array
    {
        $unsortedHands = [];

        foreach ($hands as $hand) {
            $serialize = serialize($hand);
            $unsortedHands[$serialize] = $this->rankTheHand($hand);
        }

        array_multisort($unsortedHands, SORT_ASC);

        $sortedHands = [];
        foreach ($unsortedHands as $key => $card) {
            $sortedHands[] = unserialize($key, [Hand::class]);
        }

        return $sortedHands;
    }
}
