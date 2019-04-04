<?php
namespace BrainGames\Game\Progression;

use function BrainGames\GameEngine\run;

const START = 3;
const STEP = 3;
const LENGTH = 10;
const DESCRIPTION = 'What number is missing in the progression?';

function runProgression()
{
    run(
        function () {
            return getSessionProgression();
        },
        DESCRIPTION
    );
}

function getSessionProgression()
{
    $progression = range(
        START,
        START + STEP * LENGTH,
        STEP
    );

    $answerIndex = rand(0, LENGTH);

    $answer = $progression[$answerIndex];

    $progression[$answerIndex] = '..';
    $question = join(' ', $progression);

    return [
        'question' => $question,
        'answer' => $answer
    ];
}
