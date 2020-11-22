<?php
declare(strict_types=1);

namespace Tests\HandRankings;

use Poker\Card;
use Poker\Hand;
use Poker\HandRankings\Flush;
use PHPUnit\Framework\TestCase;
use Poker\Rank;
use Poker\Suit;

class FlushTest extends TestCase
{
    /** @test */
    function flush_is_detected_nicely(): void
    {
        $hand = new Hand(...[
            new Card(Rank::ACE(), Suit::CLUBS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::QUEEN(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
            new Card(Rank::SEVEN(), Suit::CLUBS()),
        ]);

        $ranking = new Flush();

        self::assertTrue($ranking->matchesThis($hand));
    }

    /** @test */
    function flush_is_NOT_detected_when_there_are_different_suits(): void
    {
        $hand = new Hand(...[
            new Card(Rank::ACE(), Suit::HEARTS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::QUEEN(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::CLUBS()),
        ]);

        $ranking = new Flush();

        self::assertFalse($ranking->matchesThis($hand));
    }

    /** @test */
    function flush_is_NOT_detected_when_there_IS_sequence(): void
    {
        $hand = new Hand(...[
            new Card(Rank::ACE(), Suit::CLUBS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::QUEEN(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::CLUBS()),
        ]);

        $ranking = new Flush();

        self::assertFalse($ranking->matchesThis($hand));
    }
}
