<?php

declare(strict_types=1);

namespace Poker\HandRankings;

use Poker\Card;
use Poker\Hand;

/**
 * Five cards which do not form any of the combinations listed above. When comparing two such hands, the one with the
 * better highest card wins. If the highest cards are equal the second cards are compared; if they are equal too the
 * third cards are compared, and so on. So A-J-9-5-3 beats A-10-9-6-4 because the jack beats the ten.
 */
final class HighCard implements HandRanking
{
    function matchesThis(Hand $hand): bool
    {
        /*
         * In every hand there is a high card, so this this is always true
         */
        return true;
    }

    static function getSortingPriorityOfThisRanking(): int
    {
        return 10;
    }
}
