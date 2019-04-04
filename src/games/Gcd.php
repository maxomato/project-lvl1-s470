<?php
namespace BrainGames\Game\Gcd;

use function BrainGames\Cli\run;

function runGcd()
{
    run([
        'type' => 'gcd',
        'info' => 'Find the greatest common divisor of given numbers.'
    ]);
}

function getQuestionGcd()
{
    $a = rand(0, 100);
    $b = rand(0, 100);

    $rightAnswer = getGcd($a, $b);

    return [
        'content' => join(' ', [$a, $b]),
        'answer' => $rightAnswer
    ];
}

function getGcd(int $a, int $b)
{
    if ($a == 0) {
        return $b;
    } elseif ($b == 0) {
        return $a;
    }

    return ($a % $b) ? getGcd($b, $a % $b) : $b;
}
