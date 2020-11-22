<?php

declare(strict_types=1);

namespace Tests\HandRankings;

use PHPUnit\Framework\TestCase;
use Poker\Card;
use Poker\Hand;
use Poker\HandRankings\Pair;
use Poker\Rank;
use Poker\Suit;

final class PairTest extends TestCase
{
    /** @test */
    function pair_of_card_can_be_detected_if_its_there(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::HEARTS()),
            new Card(Rank::SEVEN(), Suit::CLUBS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
        ]);

        $ranking = new Pair();

        self::assertTrue($ranking->matchesThis($hand));
    }

    /** @test */
    function pair_of_card_can_NOT_be_detected_if_its_NOT_there(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::TWO(), Suit::HEARTS()),
            new Card(Rank::SEVEN(), Suit::CLUBS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
        ]);

        $ranking = new Pair();

        self::assertFalse($ranking->matchesThis($hand));
    }
}
