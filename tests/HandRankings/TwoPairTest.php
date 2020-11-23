<?php

declare(strict_types=1);

namespace Tests\HandRankings;

use PHPUnit\Framework\TestCase;
use Poker\Card;
use Poker\Hand;
use Poker\HandRankings\TwoPair;
use Poker\Rank;
use Poker\Suit;

final class TwoPairTest extends TestCase
{
    /** @test */
    function twoPair_is_detected_nicely(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::HEARTS()),
            new Card(Rank::NINE(), Suit::DIAMONDS()),
            new Card(Rank::NINE(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
        ]);

        $ranking = new TwoPair();

        self::assertTrue($ranking->matchesThis($hand));
    }

    /** @test */
    function twoPair_is_NOT_detected_when_its_NOT_there(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::HEARTS()),
            new Card(Rank::NINE(), Suit::DIAMONDS()),
            new Card(Rank::SIX(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
        ]);

        $ranking = new TwoPair();

        self::assertFalse($ranking->matchesThis($hand));
    }
}
