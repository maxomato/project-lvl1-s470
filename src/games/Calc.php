<?php
namespace BrainGames\Game\Calc;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 100;
const OPERATIONS = ['*', '-', '+'];

function getQuestionCalc()
{
    $a = getRandomNumber();
    $b = getRandomNumber();
    $operation = getRandomOperation();
    $content = join(' ', [$a, $operation, $b]);

    return [
        'content' => $content,
        'answer' => getRightAnswer($a, $b, $operation)
    ];
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
