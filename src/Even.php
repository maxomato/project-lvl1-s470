<?php
namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function runEven($userName)
{
    for ($i = 0; $i < 3; $i++) {
        $randomNumber = rand(1, 100);
        line("Question: %s", $randomNumber);

        $answer = prompt('Your answer: ');

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