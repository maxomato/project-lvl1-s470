<?php
namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;
use function BrainGames\Game\getQuestion;

const ROUNDS_COUNT = 3;

function run(array $config = [])
{
    $info = $config['info'] ?? '';
    $userName = getName($info);

    $type = $config['type'] ?? '';

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $question = getQuestion($type);
        if (isset($question['error'])) {
            line($question['error']);

            return;
        }

        line('Question: %s', $question['content']);

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
    line($info);
    line();

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line();

    return $name;
}
