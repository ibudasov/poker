<?php

declare(strict_types=1);

namespace Tests\HandRankings;

use PHPUnit\Framework\TestCase;
use Poker\Card;
use Poker\Hand;
use Poker\HandRankings\FullHouse;
use Poker\Rank;
use Poker\Suit;

final class FullHouseTest extends TestCase
{
    /** @test */
    function fullHouse_can_be_detected_if_its_there(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::HEARTS()),
            new Card(Rank::KING(), Suit::DIAMONDS()),
            new Card(Rank::KING(), Suit::HEARTS()),
            new Card(Rank::KING(), Suit::CLUBS()),
        ]);

        $ranking = new FullHouse();

        self::assertTrue($ranking->matchesThis($hand));
    }

    /** @test */
    function fullHouse_CANNOT_be_detected_if_its_NOT_there(): void
    {
        $hand = new Hand(...[
            new Card(Rank::NINE(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::HEARTS()),
            new Card(Rank::KING(), Suit::DIAMONDS()),
            new Card(Rank::KING(), Suit::HEARTS()),
            new Card(Rank::KING(), Suit::CLUBS()),
        ]);

        $ranking = new FullHouse();

        self::assertFalse($ranking->matchesThis($hand));
    }
}
