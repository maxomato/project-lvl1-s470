<?php
namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;
use function BrainGames\Even\runEven;
use function BrainGames\Calc\runCalc;

function run($config)
{
    $info = $config['info'] ?? '';
    $name = getName($info);

    $type = $config['type'] ?? '';
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
