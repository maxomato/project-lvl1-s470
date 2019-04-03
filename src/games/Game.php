<?php
namespace BrainGames\Game;

use function BrainGames\Game\Calc\getQuestionCalc;
use function BrainGames\Game\Even\getQuestionEven;

function getQuestion($type)
{
    switch ($type) {
        case 'even':
            return getQuestionEven();

        case 'calc':
            return getQuestionCalc();
    }

    return null;
}