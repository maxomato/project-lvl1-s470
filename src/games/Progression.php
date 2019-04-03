<?php
namespace BrainGames\Game\Progression;

use function BrainGames\Cli\run;

const START_PROGRESSION = 3;
const STEP_PROGRESSION = 3;
const LENGTH_PROGRESSION = 10;

function runProgression()
{
    run([
        'type' => 'progression',
        'info' => 'What number is missing in the progression?'
    ]);
}

function getQuestionProgression()
{
    $progression = getProgression();

    $i = rand(0, count($progression) - 1);

    $rightAnswer = $progression[$i];
    $progression[$i] = '..';

    return [
        'content' => join(' ', $progression),
        'answer' => $rightAnswer
    ];
}

function getProgression()
{
    return range(
        START_PROGRESSION,
        START_PROGRESSION + STEP_PROGRESSION * LENGTH_PROGRESSION,
        STEP_PROGRESSION
    );
}
