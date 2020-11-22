<?php
declare(strict_types=1);

namespace Tests;

use Poker\Card;
use Poker\Hand;
use Poker\HandRanker;
use PHPUnit\Framework\TestCase;
use Poker\HandRankings\HighCard;
use Poker\HandRankings\Pair;
use Poker\HandRankings\ThreeOfAKind;
use Poker\Rank;
use Poker\Suit;

class HandRankerTest extends TestCase
{
    /** @test */
    public function highCard_ranking_work_for_us_when_needed(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::ACE(), Suit::CLUBS()),
            new Card(Rank::SEVEN(), Suit::CLUBS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
        ]);

        $handRanker = new HandRanker();

        self::assertEquals(HighCard::getSortingPriorityOfThisRanking(), $handRanker->rankTheHand($hand));
    }

    /** @test */
    public function pair_ranking_work_for_us_when_applicable(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::HEARTS()),
            new Card(Rank::SEVEN(), Suit::CLUBS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
        ]);

        $handRanker = new HandRanker();

        self::assertEquals(Pair::getSortingPriorityOfThisRanking(), $handRanker->rankTheHand($hand));
    }

    /** @test */
    public function threeOfAKind_work_for_us_when_applicable(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::HEARTS()),
            new Card(Rank::TEN(), Suit::DIAMONDS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
        ]);

        $handRanker = new HandRanker();

        self::assertEquals(ThreeOfAKind::getSortingPriorityOfThisRanking(), $handRanker->rankTheHand($hand));
    }


}
