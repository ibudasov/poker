<?php

declare(strict_types=1);

namespace Tests\HandRankings;

use PHPUnit\Framework\TestCase;
use Poker\Card;
use Poker\Hand;
use Poker\HandRankings\HighCard;
use Poker\Rank;
use Poker\Suit;

final class HighCardTest extends TestCase
{
    /** @test */
    public function highCard_can_be_detected_if_its_there(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::ACE(), Suit::CLUBS()),
            new Card(Rank::SEVEN(), Suit::CLUBS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
        ]);

        $ranking = new HighCard();

        self::assertTrue($ranking->matchesThis($hand));
    }
}
