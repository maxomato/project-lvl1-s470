<?php
namespace BrainGames\Game\Gcd;

use function BrainGames\GameEngine\run;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function runGcd()
{
    run(
        function () {
            return getSessionGcd();
        },
        DESCRIPTION
    );
}

function getSessionGcd()
{
    $a = rand(0, 100);
    $b = rand(0, 100);

    $question = join(' ', [$a, $b]);
    $answer = getGcd($a, $b);

    return [
        'question' => $question,
        'answer' => $answer
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
