<?php

declare(strict_types=1);

namespace Poker;

use Poker\HandRankings\HandRanking;
use Poker\HandRankings\HighCard;
use Poker\HandRankings\Pair;
use Poker\HandRankings\ThreeOfAKind;

class HandRanker
{
    /**
     * @todo: use getSortingPriorityOfThisRanking here to avoid logic duplication
     */
    private const PRIORITIZED_LIST_OF_RANKINGS = [
        ThreeOfAKind::class,
        Pair::class,
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
