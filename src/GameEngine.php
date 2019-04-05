<?php
namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function run($getSession, string $info)
{
    line('Welcome to the Brain Game!');
    if (!empty($info)) {
        line($info);
    }
    line();

    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line();

    if (is_null($getSession)) {
        return;
    }

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $rightAnswer] = $getSession();

        line('Question: %s', $question);

        $userAnswer = prompt('Your answer');

        if ($userAnswer != $rightAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $rightAnswer);
            line("Let's try again, %s!", $userName);

            return;
        }

        line("Correct!");
    }

    line("Congratulations, %s!", $userName);
}
