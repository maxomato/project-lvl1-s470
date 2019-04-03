<?php
namespace BrainGames\Game\Gcd;

use function BrainGames\Game\getRandomNumber;

function getQuestionGcd()
{
    $a = getRandomNumber();
    $b = getRandomNumber();

    $rightAnswer = getGcd($a, $b);

    return [
        'content' => join(' ', [$a, $b]),
        'answer' => $rightAnswer
    ];
}

function getGcd(int $a, int $b)
{
    return ($a % $b) ? getGcd($b,$a % $b) : $b;
}
