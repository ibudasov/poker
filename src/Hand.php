<?php

declare(strict_types=1);

namespace Poker;

use function array_keys;
use function array_multisort;
use function array_values;
use function natsort;
use function print_r;
use const SORT_DESC;

class Hand
{
    /** @var Card[] */
    private $cards;

    public function __construct(Card ...$cards)
    {
        if (count($cards) > 5) {
            throw new SorryMax5CardsAreAllowedAccordingToTheRules();
        }

        $this->cards = $cards;
    }

    /** @return Card[] */
    public function getCardsInTheHand(): array
    {
        return $this->cards;
    }

    /** @return Card[] */
    public function getCardsInTheHandSortedByRank(): array
    {
        $unsortedCards = [];

        foreach ($this->cards as $card) {
            $unsortedCards[$card->__toString()] = $card->getValueOfTheCard();
        }

        array_multisort($unsortedCards, SORT_DESC);

        $sortedCards = [];
        foreach ($unsortedCards as $key => $card) {
            $sortedCards[] = Card::fromString($key);
        }

        return $sortedCards;
    }
}
