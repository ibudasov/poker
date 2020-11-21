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
}
