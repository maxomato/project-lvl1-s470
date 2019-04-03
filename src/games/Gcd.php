<?php
namespace BrainGames\Game\Gcd;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 100;

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

function getRandomNumber()
{
    return rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
}

function getGcd(int $a, int $b)
{
    return ($a % $b) ? getGcd($b,$a % $b) : $b;
}
