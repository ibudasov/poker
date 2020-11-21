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
    /**
     * Nice emojis from OSX appeared to be something different then unicode chars,
     * for example, ♥️ contains out of 2 chars - one for the symbol itself, and one for the color
     * So, sadly, no emojis here 🤷🏽‍
     */

    private const CLUBS = '♣';
    private const DIAMONDS = '♦';
    private const HEARTS = '♥';
    private const SPADES = '♠';
}
