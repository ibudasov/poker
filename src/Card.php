<?php

declare(strict_types=1);

namespace Poker;


use BadMethodCallException;
use function mb_strlen;

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

    public function getRank(): Rank
    {
        return $this->rank;
    }

    public function getSuit(): Suit
    {
        return $this->suit;
    }

    public function getValueOfTheCard(): int
    {
        return RankMapper::getValueOfRank($this->getRank());
    }

    public function __toString(): string
    {
        return $this->getRank()->getValue() . $this->getSuit()->getValue();
    }

    public static function fromString(string $cardAsString): self
    {
        if (mb_strlen($cardAsString, 'UTF-8') === 3) {
            return new self(

                // As whole string is 3 chars, we have 2 chars for Rank there
                new Rank(mb_substr($cardAsString, 0, 2)),

                // Suit is only one char
                new Suit(mb_substr($cardAsString, 2, 3))
            );
        }

        if (mb_strlen($cardAsString, 'UTF-8') === 2) {
            return new self(

                // As whole string is 2 chars, we have 1 chars for Rank there
                new Rank(mb_substr($cardAsString, 0, 1)),

                // Suit is only one char
                new Suit(mb_substr($cardAsString, 1, 2))
            );
        }

        throw new BadMethodCallException(
            'Card as a string should have exactly 2 or 3 chars, got ' . mb_strlen($cardAsString)
        );
    }
}
