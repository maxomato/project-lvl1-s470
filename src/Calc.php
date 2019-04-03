<?php
namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;

const MAX_COUNT_TRY = 3;
const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 100;
const OPERATIONS = ['*', '-', '+'];

function runCalc($userName)
{
    for ($i = 0; $i < MAX_COUNT_TRY; $i++) {
        $a = getRandomNumber();
        $b = getRandomNumber();
        $operation = getRandomOperation();

        line("Question: %s %s %s", $a, $operation, $b);

        $answer = prompt('Your answer');

        $correctAnswer = getRightAnswer($a, $b, $operation);
        if (is_null($correctAnswer)) {
            line("Error! The operation '%s' is unsupported!", $operation);

            return;
        }

        if ($answer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $userName);

            return;
        }

        line("Correct!");
    }

    line("Congratulations, %s!", $userName);
}

function getRandomOperation()
{
    $i = rand(0, count(OPERATIONS) - 1);

    return OPERATIONS[$i];
}

function getRandomNumber()
{
    return rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
}

function getRightAnswer(int $a, int $b, string $operation)
{
    switch ($operation) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
    }

    return null;
}
