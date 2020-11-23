<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Poker\Card;
use Poker\Rank;
use Poker\Suit;

final class CardTest extends TestCase
{
    /** @test */
    function the_value_of_the_card_can_be_determined(): void
    {
        $card = new Card(Rank::TEN(), Suit::CLUBS());

        self::assertEquals(9, $card->getValueOfTheCard());
    }
}
