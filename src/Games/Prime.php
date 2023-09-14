<?php

namespace Brain\Games\Prime;

require_once __DIR__ . '/../../vendor/autoload.php';

use function Brain\Games\Engine\greet;
use function cli\line;
use function cli\prompt;


function isPrime($number)
{
    if (($number === 1) || ($number === 2)) {
        return 'no';
    }


    if (($number % 2 === 0) || ($number % 3 === 0)) {
        return 'no';
    }

    $border = round(sqrt($number));

    $potentialDivisers = 5;

    for ($potentialDivisers; $potentialDivisers <= $border; $potentialDivisers += 2) {
        if ($number % $potentialDivisers == 0) {
            return 'no';
        }
    }

    return 'yes';
}


function findPrime()
{
    $name = greet();

    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    $numberOfRounds = 3;
    $currentRound = 0;



    for ($currentRound; $currentRound < $numberOfRounds; $currentRound++) {
        $randomNumber = rand(1, 3571);
        #$test = 2;
        line('Question: %d', $randomNumber); // line('Question: %d', $randomNumber);
        $userAnswer = prompt('Your answer');

        $correctAnswer = isPrime($randomNumber);


        if ($userAnswer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct anwer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            break;
        }
    }
    if ($currentRound === $numberOfRounds) {
        line('Congratulations, %s!', $name);
    }
}
