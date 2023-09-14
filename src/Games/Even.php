<?php

namespace Brain\Games\Even;

require_once __DIR__ . '/../../vendor/autoload.php';
use function Brain\Games\Engine\greet;
use function cli\line;
use function cli\prompt;


function isEven($number): string
{
    if ($number % 2 === 0) {
        return 'yes';
    }

    return 'no';
}

function playEven()
{
    $name = greet();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $numberOfRounds = 3;
    $currentRound = 0;

    for ($currentRound; $currentRound < $numberOfRounds; $currentRound++) {
        $randomNumber = rand();
        line('Question: %d', $randomNumber);
        $userAnswer = prompt('Your answer');
        $correctAnswer = isEven($randomNumber);

        if ($userAnswer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct anwer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            break;
        }

        line('Correct!');
    }

    if ($currentRound === $numberOfRounds) {
        line('Congratulations, %s!', $name);
    }
}
