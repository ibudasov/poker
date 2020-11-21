<?php

declare(strict_types=1);

namespace Poker\HandRankings;

use Poker\Card;
use Poker\Hand;

interface HandRanking
{
    public function matchesThis(Hand $hand): bool;

    public function getRankingValueOfThis(Hand $hand): int;

    /** @return Card[] */
    public function getMatchedSequence(Hand $hand): array;
}
