<?php
namespace BrainGames\Game\Even;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 100;

function getQuestionEven()
{
    $question = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);

    return [
        'content' => $question,
        'answer' => isEven($question) ? 'yes' : 'no'
    ];
}

function isEven($number)
{
    return $number % 2 === 0;
}
