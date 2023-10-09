<?php

namespace Code\Engine;

use function cli\line;
use function cli\prompt;

function greet(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function playGame(callable $generateQuestion, string $task)
{
    $name = greet();
    line($task);

    $numberOfRounds = 3;
    $currentRound = 0;

    for ($currentRound; $currentRound < $numberOfRounds; $currentRound++) {
        $questionAnswer = $generateQuestion();
        $question = $questionAnswer['question'];
        $correctAnswer = $questionAnswer['answer'];
        line('Question: %s', (string) $question);
        $userAnswer = prompt('Your answer');
        if ($userAnswer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }

        line('Correct!');
    }

    line('Congratulations, %s!', $name);
}
