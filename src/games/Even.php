<?php
namespace BrainGames\Game\Even;

use function BrainGames\GameEngine\run;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function runEven()
{
    run(
        function () {
            $question = rand(0, 100);
            $answer = isEven($question) ? 'yes' : 'no';

            return [$question, $answer];
        },
        DESCRIPTION
    );
}

function isEven($number)
{
    return $number % 2 === 0;
}
