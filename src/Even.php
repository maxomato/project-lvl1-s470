<?php
namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

const MAX_COUNT_TRY = 3;
const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 100;

function runEven($userName)
{
    for ($i = 0; $i < MAX_COUNT_TRY; $i++) {
        $randomNumber = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        line("Question: %s", $randomNumber);

        $answer = prompt('Your answer');

        $isEven = isEven($randomNumber);
        $correctAnswer = $isEven ? 'yes' : 'no';

        if ($answer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $userName);

            return;
        }

        line("Correct!");
    }

    line("Congratulations, %s!", $userName);
}

function isEven($number)
{
    return $number % 2 === 0;
}
