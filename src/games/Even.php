<?php
namespace BrainGames\Game\Even;

use function BrainGames\Game\Calc\getRandomNumber;

function getQuestionEven()
{
    $question = getRandomNumber();

    return [
        'content' => $question,
        'answer' => isEven($question) ? 'yes' : 'no'
    ];
}

function isEven($number)
{
    return $number % 2 === 0;
}
