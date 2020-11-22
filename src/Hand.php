<?php

declare(strict_types=1);

namespace Poker;

use function array_multisort;
use function preg_match;
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

    public function isThereASequenceOf5(): bool
    {
        $ranksInTheSequence = 'AKQJ1098765432';

        $whatIsInTheHand = '';

        foreach ($this->getCardsInTheHandSortedByRank() as $card) {
            $whatIsInTheHand .= $card->getRank()->getValue();
        }

        return 0 !== preg_match('/'.$whatIsInTheHand.'/', $ranksInTheSequence);
    }
}
