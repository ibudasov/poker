<?php

declare(strict_types=1);

namespace Poker;

final class RankMapper
{
    public static function getValueOfRank(Rank $rank): int
    {
        switch ($rank) {
            case Rank::ACE():
                return 13;
            case Rank::KING():
                return 12;
            case Rank::QUEEN():
                return 11;
            case Rank::JACK():
                return 10;
            case Rank::TEN():
                return 9;
            case Rank::NINE():
                return 8;
            case Rank::EIGHT():
                return 7;
            case Rank::SEVEN():
                return 6;
            case Rank::SIX():
                return 5;
            case Rank::FIVE():
                return 4;
            case Rank::FOUR():
                return 3;
            case Rank::THREE():
                return 2;
            case Rank::TWO():
                return 1;
        }
    }
}
