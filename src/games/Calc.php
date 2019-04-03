<?php
namespace BrainGames\Game\Calc;

use function BrainGames\Cli\run;
use function BrainGames\Game\getRandomNumber;

const OPERATIONS = ['*', '-', '+'];

function runCalc()
{
    run([
        'type' => 'calc',
        'info' => 'What is the result of the expression?'
    ]);
}

function getQuestionCalc()
{
    $a = getRandomNumber();
    $b = getRandomNumber();
    $operation = getRandomOperation();

    $rightAnswer = getRightAnswer($a, $b, $operation);
    if (is_null($rightAnswer)) {
        return [
            'error' => "Error! Operation {$operation} isn't supported"
        ];
    }

    return [
        'content' => join(' ', [$a, $operation, $b]),
        'answer' => $rightAnswer
    ];
}

function getRandomOperation()
{
    $i = rand(0, count(OPERATIONS) - 1);

    return OPERATIONS[$i];
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
