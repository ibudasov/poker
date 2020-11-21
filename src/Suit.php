<?php

declare(strict_types=1);

namespace Poker;

use MyCLabs\Enum\Enum;

/**
 * @method static self CLUBS()
 * @method static self DIAMONDS()
 * @method static self HEARTS()
 * @method static self SPADES()
 */
class Suit extends Enum
{
    private const CLUBS = 'clubs';
    private const DIAMONDS = 'diamonds';
    private const HEARTS = 'hearts';
    private const SPADES = 'spades';
}
