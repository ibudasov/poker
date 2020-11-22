<?php

declare(strict_types=1);

namespace Poker;

use Poker\HandRankings\HandRanking;
use Poker\HandRankings\HighCard;

class HandRanker
{
    private const PRIORITIZED_LIST_OF_RANKINGS = [
        HighCard::class,
    ];

    public function rankTheHand(Hand $hand): int
    {
        foreach (self::PRIORITIZED_LIST_OF_RANKINGS as $rankingClassName) {
            /** @var HandRanking $ranking */
            $ranking = new $rankingClassName();

            if ($ranking->matchesThis($hand)) {
                return $ranking::getSortingPriorityOfThisRanking();
            }
        }
    }
}
