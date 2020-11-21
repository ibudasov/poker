<?php

declare(strict_types=1);

namespace Poker;

class Hand
{
    /** @var Card[] */
    private $cards;

    public function __construct(Card ...$cards)
    {
        if (count($cards) > 5) {
            throw new SorryOnly5CardsAreAllowedAccordingToTheRules();
        }

        $this->cards = $cards;
    }
}
