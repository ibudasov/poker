<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Poker\Card;
use Poker\Hand;
use Poker\HandRanker;
use Poker\HandRankings\Flush;
use Poker\HandRankings\FourOfAKind;
use Poker\HandRankings\FullHouse;
use Poker\HandRankings\HighCard;
use Poker\HandRankings\Pair;
use Poker\HandRankings\RoyalFlush;
use Poker\HandRankings\StraightFlush;
use Poker\HandRankings\ThreeOfAKind;
use Poker\HandRankings\TwoPair;
use Poker\Rank;
use Poker\Suit;

final class HandRankerTest extends TestCase
{
    /** @test */
    function highCard_is_chosen_among_other_rankings_when_applicable(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::ACE(), Suit::CLUBS()),
            new Card(Rank::SEVEN(), Suit::CLUBS()),
            new Card(Rank::KING(), Suit::HEARTS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
        ]);

        $handRanker = new HandRanker();

        self::assertEquals(HighCard::getSortingPriorityOfThisRanking(), $handRanker->rankTheHand($hand));
    }

    /** @test */
    function pair_ranking_is_chosen_among_other_rankings_when_applicable(): void
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
    function threeOfAKind_is_chosen_among_other_rankings_when_applicable(): void
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
    function fullHouse_is_chosen_among_other_rankings_when_applicable(): void
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
    function fourOfAKind_is_chosen_among_other_rankings_when_applicable(): void
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

    /** @test */
    function straightFlush_is_chosen_among_other_rankings_when_applicable(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TWO(), Suit::CLUBS()),
            new Card(Rank::THREE(), Suit::CLUBS()),
            new Card(Rank::FOUR(), Suit::CLUBS()),
            new Card(Rank::FIVE(), Suit::CLUBS()),
            new Card(Rank::SIX(), Suit::CLUBS()),
        ]);

        $handRanker = new HandRanker();

        self::assertEquals(StraightFlush::getSortingPriorityOfThisRanking(), $handRanker->rankTheHand($hand));
    }

    /** @test */
    function royalFlush_is_chosen_among_other_rankings_when_applicable(): void
    {
        $hand = new Hand(...[
            new Card(Rank::ACE(), Suit::CLUBS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::QUEEN(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::CLUBS()),
        ]);

        $handRanker = new HandRanker();

        self::assertEquals(RoyalFlush::getSortingPriorityOfThisRanking(), $handRanker->rankTheHand($hand));
    }

    /** @test */
    function flush_is_chosen_among_other_rankings_when_applicable(): void
    {
        $hand = new Hand(...[
            new Card(Rank::ACE(), Suit::CLUBS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::QUEEN(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
            new Card(Rank::SEVEN(), Suit::CLUBS()),
        ]);

        $handRanker = new HandRanker();

        self::assertEquals(Flush::getSortingPriorityOfThisRanking(), $handRanker->rankTheHand($hand));
    }

    /** @test */
    function twoPair_is_chosen_among_other_rankings_when_applicable(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::HEARTS()),
            new Card(Rank::NINE(), Suit::DIAMONDS()),
            new Card(Rank::NINE(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
        ]);

        $handRanker = new HandRanker();

        self::assertEquals(TwoPair::getSortingPriorityOfThisRanking(), $handRanker->rankTheHand($hand));
    }
}
