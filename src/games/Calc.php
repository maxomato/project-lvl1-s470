<?php
namespace BrainGames\Game\Calc;

use function BrainGames\GameEngine\run;

const OPERATORS = ['*', '-', '+'];
const DESCRIPTION = 'What is the result of the expression?';

function runCalc()
{
    run(
        function () {
            return getSessionCalc();
        },
        DESCRIPTION
    );
}

function getSessionCalc()
{
    $a = rand(0, 100);
    $b = rand(0, 100);
    $operator = OPERATORS[array_rand(OPERATORS)];

    $question = "$a $operator $b";
    $answer = getRightAnswer($a, $b, $operator);

    return [$question, $answer];
}

function getRightAnswer(int $a, int $b, string $operator)
{
    switch ($operator) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
    }

    throw new \Exception("Error! The operator '$operator' is not supported");
}
