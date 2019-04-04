<?php
namespace BrainGames\Game\Calc;

use function BrainGames\Cli\run;

const OPERATORS = ['*', '-', '+'];
const DESCRIPTION = 'What is the result of the expression?';

function runCalc()
{
    run(
        function () {
            return getQuestionCalc();
        },
        DESCRIPTION
    );
}

function getQuestionCalc()
{
    $a = rand(0, 100);
    $b = rand(0, 100);
    $operators = getRandomOperators();

    $question = join(' ', [$a, $operators, $b]);
    $answer = getRightAnswer($a, $b, $operators);

    return [
        'question' => $question,
        'answer' => $answer
    ];
}

function getRandomOperators()
{
    $i = rand(0, count(OPERATORS) - 1);

    return OPERATORS[$i];
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
