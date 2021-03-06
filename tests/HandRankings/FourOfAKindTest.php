<?php

declare(strict_types=1);

namespace Tests\HandRankings;

use PHPUnit\Framework\TestCase;
use Poker\Card;
use Poker\Hand;
use Poker\HandRankings\FourOfAKind;
use Poker\Rank;
use Poker\Suit;

final class FourOfAKindTest extends TestCase
{
    /** @test */
    function fourOfAKind_are_detected_nicely(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::HEARTS()),
            new Card(Rank::TEN(), Suit::DIAMONDS()),
            new Card(Rank::TEN(), Suit::SPADES()),
            new Card(Rank::JACK(), Suit::CLUBS()),
        ]);

        $ranking = new FourOfAKind();

        self::assertTrue($ranking->matchesThis($hand));
    }

    /** @test */
    function FourOfAKind_shall_not_be_detected_if_not_applicable(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::HEARTS()),
            new Card(Rank::NINE(), Suit::DIAMONDS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
        ]);

        $ranking = new FourOfAKind();

        self::assertFalse($ranking->matchesThis($hand));
    }
}
