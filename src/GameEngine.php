<?php
namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function run(\Closure $getQuestion = null, string $info = '')
{
    $userName = getName($info);
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

function getName(string $info = '')
{
    line('Welcome to the Brain Game!');
    if (!empty($info)) {
        line($info);
    }
    line();

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line();

    return $name;
}
