<?php
namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function run(\Closure $createGame, string $description)
{
    line('Welcome to the Brain Game!');
    line($description);
    line();

    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line();

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $rightAnswer] = $createGame();

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
