<?php
namespace BrainGames\Game\Prime;

use function BrainGames\GameEngine\run;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function runPrime()
{
    $createGame = function () {
        $question = rand(0, 100);

        $answer = isPrime($question) ? 'yes' : 'no';

        return [$question, $answer];
    };

    run($createGame, DESCRIPTION);
}

function isPrime(int $number)
{
    if ($number <= 1) {
        return false;
    }

    for ($i = 2; $i < sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
