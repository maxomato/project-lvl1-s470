<?php
namespace BrainGames\Game\Even;

use function BrainGames\Cli\run;

function runEven()
{
    run([
        'type' => 'even',
        'info' => 'Answer "yes" if number even otherwise answer "no".'
    ]);
}

function getQuestionEven()
{
    $question = rand(0, 100);

    return [
        'content' => $question,
        'answer' => isEven($question) ? 'yes' : 'no'
    ];
}

function isEven($number)
{
    return $number % 2 === 0;
}
