<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Poker\Card;
use Poker\Hand;
use Poker\Rank;
use Poker\SorryMax5CardsAreAllowedAccordingToTheRules;
use Poker\Suit;

class HandTest extends TestCase
{
    /** @test */
    public function max_5_cards_are_allowed_in_the_hand(): void
    {
        $this->expectException(SorryMax5CardsAreAllowedAccordingToTheRules::class);

        new Hand(...[
            new Card(Rank::ACE(), Suit::CLUBS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
            new Card(Rank::QUEEN(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::SEVEN(), Suit::CLUBS()),
        ]);
    }

    /** @test */
    public function cards_get_sorted(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::ACE(), Suit::CLUBS()),
            new Card(Rank::SEVEN(), Suit::CLUBS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
        ]);

        self::assertEquals(
            [
                new Card(Rank::ACE(), Suit::CLUBS()),
                new Card(Rank::KING(), Suit::CLUBS()),
                new Card(Rank::JACK(), Suit::CLUBS()),
                new Card(Rank::TEN(), Suit::CLUBS()),
                new Card(Rank::SEVEN(), Suit::CLUBS()),
            ],
            $hand->getCardsInTheHandSortedByRank()
        );
    }

    /** @test */
    public function cards_get_sorted_even_with_a_few_same_ranks(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::TEN(), Suit::HEARTS()),
            new Card(Rank::TEN(), Suit::DIAMONDS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
        ]);

        self::assertEquals(
            [
                new Card(Rank::KING(), Suit::CLUBS()),
                new Card(Rank::JACK(), Suit::CLUBS()),
                new Card(Rank::TEN(), Suit::CLUBS()),
                new Card(Rank::TEN(), Suit::HEARTS()),
                new Card(Rank::TEN(), Suit::DIAMONDS()),
            ],
            $hand->getCardsInTheHandSortedByRank()
        );
    }

    /** @test */
    public function sequence_of_5_cards_can_be_detected(): void
    {
        $hand = new Hand(...[
            new Card(Rank::TEN(), Suit::CLUBS()),
            new Card(Rank::ACE(), Suit::CLUBS()),
            new Card(Rank::QUEEN(), Suit::CLUBS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
        ]);

        self::assertTrue($hand->isThereASequenceOf5());
    }

    /** @test */
    public function sequence_of_5_cards_CANNOT_be_detected_if_its_NOT_there(): void
    {
        $hand = new Hand(...[
            new Card(Rank::SEVEN(), Suit::CLUBS()),
            new Card(Rank::ACE(), Suit::CLUBS()),
            new Card(Rank::QUEEN(), Suit::CLUBS()),
            new Card(Rank::KING(), Suit::CLUBS()),
            new Card(Rank::JACK(), Suit::CLUBS()),
        ]);

        self::assertFalse($hand->isThereASequenceOf5());
    }

}
