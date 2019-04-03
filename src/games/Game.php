<?php
namespace BrainGames\Game;

use function BrainGames\Game\Calc\getQuestionCalc;
use function BrainGames\Game\Even\getQuestionEven;
use function BrainGames\Game\Gcd\getQuestionGcd;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 100;

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

function getRandomNumber()
{
    return rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
}