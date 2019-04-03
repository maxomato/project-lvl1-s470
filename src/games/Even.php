<?php
namespace BrainGames\Game\Even;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 100;

function getQuestionEven()
{
    $randomNumber = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);

    $isEven = isEven($randomNumber);

    return [
        'content' => $randomNumber,
        'answer' => $isEven ? 'yes' : 'no'
    ];
}

function isEven($number)
{
    return $number % 2 === 0;
}
