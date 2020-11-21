<?php
declare(strict_types=1);

namespace Poker;


class RankMapper
{
    public static function getValueOfRank(Rank $rank): int
    {
        switch ($rank) {
            case Rank::ACE():
                return 1;
            case Rank::KING():
                return 2;
            case Rank::QUEEN():
                return 3;
            case Rank::JACK():
                return 4;
            case Rank::TEN():
                return 5;
            case Rank::NINE():
                return 6;
            case Rank::EIGHT():
                return 7;
            case Rank::SEVEN():
                return 8;
            case Rank::SIX():
                return 9;
            case Rank::FIVE():
                return 10;
            case Rank::FOUR():
                return 11;
            case Rank::THREE():
                return 12;
            case Rank::TWO():
                return 13;
        }
    }
}