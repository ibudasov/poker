<?php

declare(strict_types=1);

namespace Poker;

use BadMethodCallException;
use function mb_strlen;

final class Card
{
    /** @var Rank */
    private $rank;

    /** @var Suit */
    private $suit;

    function __construct(Rank $rank, Suit $suit)
    {
        $this->rank = $rank;
        $this->suit = $suit;
    }

    function getRank(): Rank
    {
        return $this->rank;
    }

    function getSuit(): Suit
    {
        return $this->suit;
    }

    function getValueOfTheCard(): int
    {
        return RankMapper::getValueOfRank($this->getRank());
    }
}
