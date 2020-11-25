# Poker 

This library provides a possibility to rank combinations of cards, such as RoyalFlush, StraightFlush, Pair, etc.
Based on this rule set: https://www.fgbradleys.com/et_poker.asp 

# Installation 

`composer require ibudasov/poker`

# Usage

The application which uses this library can be found here: https://github.com/ibudasov/poker-cli

### Ranking one hand
```
// instantiating the ranker
$handRanker = new HandRanker();

// then you might have only one hand
$hand = new Hand(...[
    new Card(Rank::TEN(), Suit::CLUBS()),
    new Card(Rank::TEN(), Suit::HEARTS()),
    new Card(Rank::TEN(), Suit::DIAMONDS()),
    new Card(Rank::TEN(), Suit::SPADES()),
    new Card(Rank::JACK(), Suit::CLUBS()),
]);

// and you can rank that one hand
$handRanker->rankTheHand($hand);

```

### Ranking multiple hands

```

// multiple hands, with different combinations of card
$twoPair = new Hand(...[
    new Card(Rank::TEN(), Suit::CLUBS()),
    new Card(Rank::TEN(), Suit::HEARTS()),
    new Card(Rank::NINE(), Suit::DIAMONDS()),
    new Card(Rank::NINE(), Suit::CLUBS()),
    new Card(Rank::JACK(), Suit::CLUBS()),
]);
$royalFlush = new Hand(...[
    new Card(Rank::ACE(), Suit::CLUBS()),
    new Card(Rank::KING(), Suit::CLUBS()),
    new Card(Rank::QUEEN(), Suit::CLUBS()),
    new Card(Rank::JACK(), Suit::CLUBS()),
    new Card(Rank::TEN(), Suit::CLUBS()),
]);
$highCard = new Hand(...[
    new Card(Rank::TEN(), Suit::CLUBS()),
    new Card(Rank::ACE(), Suit::CLUBS()),
    new Card(Rank::SEVEN(), Suit::CLUBS()),
    new Card(Rank::KING(), Suit::HEARTS()),
    new Card(Rank::JACK(), Suit::CLUBS()),
]);

// it will return you array of sorted hands, according to the rules https://www.fgbradleys.com/et_poker.asp
$handRanker->rankMultipleHands(...[
    $twoPair,
    $royalFlush,
    $highCard
]);

```
# Todo

- Hand does not validate cards inside, so there might be duplicates. Also there is no validation of cards across hands. So it's up to the client application 
- If 2 hands are ranked the same — they will NOT be re-ranked, which is needed by the rules. This is something for the future.

