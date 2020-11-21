<?php

declare(strict_types=1);

namespace Poker;

use MyCLabs\Enum\Enum;

/**
 * @method static self ACE()
 * @method static self KING()
 * @method static self QUEEN()
 * @method static self JACK()
 * @method static self TEN()
 * @method static self NINE()
 * @method static self EIGHT()
 * @method static self SEVEN()
 * @method static self SIX()
 * @method static self FIVE()
 * @method static self FOUR()
 * @method static self THREE()
 * @method static self TWO()
 */
class Rank extends Enum
{
    private const ACE = 'A';
    private const KING = 'K';
    private const QUEEN = 'Q';
    private const JACK = 'J';
    private const TEN = '10';
    private const NINE = '9';
    private const EIGHT = '8';
    private const SEVEN = '7';
    private const SIX = '6';
    private const FIVE = '5';
    private const FOUR = '4';
    private const THREE = '3';
    private const TWO = '2';
}
