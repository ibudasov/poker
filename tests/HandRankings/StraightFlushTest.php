<?php

declare(strict_types=1);

namespace Tests\HandRankings;

use PHPUnit\Framework\TestCase;
use Poker\Card;
use Poker\Hand;
use Poker\HandRankings\StraightFlush;
use Poker\Rank;
use Poker\Suit;

final class StraightFlushTest extends TestCase
{
    /** @test */
    function straightFlush_are_detected_nicely(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TWO(), Suit::CLUBS()),
            new Card(Rank::THREE(), Suit::CLUBS()),
            new Card(Rank::FOUR(), Suit::CLUBS()),
            new Card(Rank::FIVE(), Suit::CLUBS()),
            new Card(Rank::SIX(), Suit::CLUBS()),
        ]);

        $ranking = new StraightFlush();

        self::assertTrue($ranking->matchesThis($hand));
    }

    /** @test */
    function straightFlush_is_not_detected_when_there_are_different_suits(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TWO(), Suit::HEARTS()),
            new Card(Rank::THREE(), Suit::CLUBS()),
            new Card(Rank::FOUR(), Suit::CLUBS()),
            new Card(Rank::FIVE(), Suit::CLUBS()),
            new Card(Rank::SIX(), Suit::CLUBS()),
        ]);

        $ranking = new StraightFlush();

        self::assertFalse($ranking->matchesThis($hand));
    }

    /** @test */
    function straightFlush_is_not_detected_when_there_is_no_sequence_of_5(): void
    {
        $hand = new Hand(...[
            new Card(Rank::ACE(), Suit::CLUBS()),
            new Card(Rank::THREE(), Suit::CLUBS()),
            new Card(Rank::FOUR(), Suit::CLUBS()),
            new Card(Rank::FIVE(), Suit::CLUBS()),
            new Card(Rank::SIX(), Suit::CLUBS()),
        ]);

        $ranking = new StraightFlush();

        self::assertFalse($ranking->matchesThis($hand));
    }
}
