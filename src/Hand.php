<?php

declare(strict_types=1);

namespace Poker;

use function array_multisort;
use function current;
use function preg_match;
use const SORT_DESC;

final class Hand
{
    /** @var Card[] */
    private $cards;

    function __construct(Card ...$cards)
    {
        if (count($cards) > 5) {
            throw new SorryMax5CardsAreAllowedAccordingToTheRules();
        }

        $this->cards = $cards;
    }

    /** @return Card[] */
    function getCardsInTheHand(): array
    {
        return $this->cards;
    }

    /** @return Card[] */
    function getCardsInTheHandSortedByRank(): array
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

    function isThereASequenceOf5(): bool
    {
        $ranksInTheSequence = 'AKQJ1098765432';

        $whatIsInTheHand = '';

        foreach ($this->getCardsInTheHandSortedByRank() as $card) {
            $whatIsInTheHand .= $card->getRank()->getValue();
        }

        return 0 !== preg_match('/'.$whatIsInTheHand.'/', $ranksInTheSequence);
    }

    function areTheCardsOfTheSameSuit(): bool
    {
        $previousCard = current($this->getCardsInTheHand());
        foreach ($this->getCardsInTheHand() as $card) {
            if ($card->getSuit()->getValue() !== $previousCard->getSuit()->getValue()) {
                return false;
            }
        }

        return true;
    }
}
