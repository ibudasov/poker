<?php

declare(strict_types=1);

namespace Tests\HandRankings;

use PHPUnit\Framework\TestCase;
use Poker\Card;
use Poker\Hand;
use Poker\HandRankings\HighCard;
use Poker\Rank;
use Poker\Suit;

class HighCardTest extends TestCase
{
    /** @test */
    public function make_sure_that_actually_highest_card_is_ranked_and_returned(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::ACE(), Suit::CLUBS()),
            new Card(Rank::SEVEN(), Suit::CLUBS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
        ]);

        $ranking = new HighCard();

        self::assertEquals(13, $ranking->getRankingValueOfThis($hand));
        self::assertEquals([new Card(Rank::ACE(), Suit::CLUBS())], $ranking->getMatchedSequence($hand));
    }
}
