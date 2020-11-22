<?php
declare(strict_types=1);

namespace Tests;

use Poker\Card;
use Poker\Hand;
use Poker\HandRanker;
use PHPUnit\Framework\TestCase;
use Poker\HandRankings\FourOfAKind;
use Poker\HandRankings\FullHouse;
use Poker\HandRankings\HighCard;
use Poker\HandRankings\Pair;
use Poker\HandRankings\ThreeOfAKind;
use Poker\Rank;
use Poker\Suit;

class HandRankerTest extends TestCase
{
    /** @test */
    public function highCard_is_chosen_among_other_rankings_when_applicable(): void
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
    public function pair_ranking_is_chosen_among_other_rankings_when_applicable(): void
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
    public function threeOfAKind_is_chosen_among_other_rankings_when_applicable(): void
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

    /** @test */
    public function fullHouse_is_chosen_among_other_rankings_when_applicable(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::HEARTS()),
            new Card(Rank::KING(), Suit::DIAMONDS()),
            new Card(Rank::KING(), Suit::HEARTS()),
            new Card(Rank::KING(), Suit::CLUBS()),
        ]);

        $handRanker = new HandRanker();

        self::assertEquals(FullHouse::getSortingPriorityOfThisRanking(), $handRanker->rankTheHand($hand));
    }

    /** @test */
    public function fourOfAKind_is_chosen_among_other_rankings_when_applicable(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::HEARTS()),
            new Card(Rank::TEN(), Suit::DIAMONDS()),
            new Card(Rank::TEN(), Suit::SPADES()),
            new Card(Rank::JACK(), Suit::CLUBS()),
        ]);

        $handRanker = new HandRanker();

        self::assertEquals(FourOfAKind::getSortingPriorityOfThisRanking(), $handRanker->rankTheHand($hand));
    }

}
