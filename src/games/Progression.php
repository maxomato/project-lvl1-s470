<?php
namespace BrainGames\Game\Progression;

use function BrainGames\GameEngine\run;

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
    $start = rand(0, 100);
    $step = rand(1, 10);
    $progression = range(
        $start,
        $start + $step * LENGTH,
        $step
    );

    $hiddenMemberIndex = rand(0, LENGTH - 1);

    $answer = $progression[$hiddenMemberIndex];

    $progression[$hiddenMemberIndex] = '..';
    $question = join(' ', $progression);

    return [$question, $answer];
}
