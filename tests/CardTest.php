<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Poker\Card;
use Poker\Rank;
use Poker\Suit;

class CardTest extends TestCase
{
    /** @test */
    public function card_can_be_created_from_string(): void
    {
        $card = Card::fromString('10♥');

        self::assertEquals(Suit::HEARTS(), $card->getSuit());
        self::assertEquals(Rank::TEN(), $card->getRank());
    }

    /** @test */
    public function card_can_be_translated_to_string(): void
    {
        $card = new Card(Rank::TEN(), Suit::CLUBS());

        self::assertEquals('10♣', $card->__toString());
    }

    /** @test */
    public function the_value_of_the_card_can_be_determined(): void
    {
        $card = new Card(Rank::TEN(), Suit::CLUBS());

        self::assertEquals(9, $card->getValueOfTheCard());
    }
}
