<?php

declare(strict_types=1);

namespace Poker;


class Card
{
    /** @var Rank */
    private $rank;

    /** @var Suit */
    private $suit;

    public function __construct(Rank $rank, Suit $suit)
    {
        $this->rank = $rank;
        $this->suit = $suit;
    }
}
