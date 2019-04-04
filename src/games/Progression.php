<?php
namespace BrainGames\Game\Progression;

use function BrainGames\Cli\run;

const START_PROGRESSION = 3;
const STEP_PROGRESSION = 3;
const LENGTH_PROGRESSION = 10;
const DESCRIPTION = 'What number is missing in the progression?';

function runProgression()
{
    run(
        function () {
            return getQuestionProgression();
        },
        DESCRIPTION
    );
}

function getQuestionProgression()
{
    $progression = getProgression();

    $i = rand(0, count($progression) - 1);

    $answer = $progression[$i];

    $progression[$i] = '..';
    $question = join(' ', $progression);

    return [
        'question' => $question,
        'answer' => $answer
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
