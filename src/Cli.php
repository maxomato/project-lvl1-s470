<?php
namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;
use function BrainGames\Even\runEven;
use function BrainGames\Calc\runCalc;

function run($type)
{
    $info = '';
    if ($type == 'even') {
        $info = 'Answer "yes" if number even otherwise answer "no".';
    } elseif ($type == 'calc') {
        $info = 'What is the result of the expression?';
    }

    $name = getName($info);
    if ($type == 'even') {
        runEven($name);
    } elseif ($type == 'calc') {
        runCalc($name);
    }
}

function getName(string $info = '')
{
    line('Welcome to the Brain Game!');
    line($info);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}
