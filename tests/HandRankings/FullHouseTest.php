<?php
declare(strict_types=1);

namespace Tests\HandRankings;

use Poker\Card;
use Poker\Hand;
use Poker\HandRankings\FullHouse;
use PHPUnit\Framework\TestCase;
use Poker\HandRankings\Pair;
use Poker\Rank;
use Poker\Suit;

class FullHouseTest extends TestCase
{
    /** @test */
    public function fullHouse_can_be_detected_if_its_there(): void
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
    public function fullHouse_CANNOT_be_detected_if_its_NOT_there(): void
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
