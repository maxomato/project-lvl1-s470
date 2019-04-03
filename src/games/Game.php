<?php
namespace BrainGames\Game;

use function BrainGames\Game\Calc\getQuestionCalc;
use function BrainGames\Game\Even\getQuestionEven;
use function BrainGames\Game\Gcd\getQuestionGcd;

function getQuestion($type)
{
    switch ($type) {
        case 'even':
            return getQuestionEven();

        case 'calc':
            return getQuestionCalc();

        case 'gcd':
            return getQuestionGcd();
    }

    return [
        'error' => "Error! Game type '$type' is not supported!"
    ];
}
