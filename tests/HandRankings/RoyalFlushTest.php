<?php

declare(strict_types=1);

namespace Tests\HandRankings;

use PHPUnit\Framework\TestCase;
use Poker\Card;
use Poker\Hand;
use Poker\HandRankings\RoyalFlush;
use Poker\Rank;
use Poker\Suit;

class RoyalFlushTest extends TestCase
{
    /** @test */
    public function royalFlush_is_detected_nicely(): void
    {
        $hand = new Hand(...[
            new Card(Rank::ACE(), Suit::CLUBS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::QUEEN(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::CLUBS()),
        ]);

        $ranking = new RoyalFlush();

        self::assertTrue($ranking->matchesThis($hand));
    }

    /** @test */
    public function royalFlush_is_not_detected_when_the_highest_card_is_not_Ace(): void
    {
        $hand = new Hand(...[
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::QUEEN(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::NINE(), Suit::CLUBS()),
        ]);

        $ranking = new RoyalFlush();

        self::assertFalse($ranking->matchesThis($hand));
    }

    /** @test */
    public function royalFlush_is_not_detected_when_the_there_are_different_suits(): void
    {
        $hand = new Hand(...[
            new Card(Rank::ACE(), Suit::HEARTS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::QUEEN(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::CLUBS()),
        ]);

        $ranking = new RoyalFlush();

        self::assertFalse($ranking->matchesThis($hand));
    }
}
