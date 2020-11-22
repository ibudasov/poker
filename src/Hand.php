<?php

declare(strict_types=1);

namespace Poker;

use function array_values;

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
        $sortedCards = [];

        foreach ($this->cards as $card) {

            /**
             * @todo: ⚠️ If there are 2 cards of the same rank - they will be merged
             */

            $sortedCards[$card->getValueOfTheCard()] = $card;
        }

        krsort($sortedCards);

        $sortedCards = array_values($sortedCards);

        return $sortedCards;
    }
}
