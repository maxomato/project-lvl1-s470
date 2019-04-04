<?php
namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function run(\Closure $getQuestion = null, string $info = '')
{
    line('Welcome to the Brain Game!');
    if (!empty($info)) {
        line($info);
    }
    line();

    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line();

    if (is_null($getQuestion)) {
        return;
    }

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $question = $getQuestion();

        line('Question: %s', $question['question']);

        $answer = prompt('Your answer');

        $rightAnswer = $question['answer'];

        if ($answer != $rightAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $rightAnswer);
            line("Let's try again, %s!", $userName);

            return;
        }

        line("Correct!");
    }

    line("Congratulations, %s!", $userName);
}
