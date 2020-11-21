<?php

declare(strict_types=1);

namespace Poker;

use Poker\HandRankings\HighCard;

class HandRanker
{
    private const PRIORITIZED_LIST_OF_RANKINGS = [
        HighCard::class,
    ];
}
