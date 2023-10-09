<?php

namespace Code\Games\Prime;

use function Code\Engine\playGame;

CONST DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number)
{
    if (($number === 1) || ($number === 2)) {
        return false;
    }


    if (($number % 2 === 0) || ($number % 3 === 0)) {
        return false;
    }

    $border = round(sqrt($number));

    $potentialDivisers = 5;

    for ($potentialDivisers; $potentialDivisers <= $border; $potentialDivisers += 2) {
        if ($number % $potentialDivisers == 0) {
            return false;
        }
    }

    return true;
}

function generateNumber()
{
    $question =  rand(1, 3571);
    $answer = isPrime($question);

    return ['question' => $question, 'answer' => $answer];
}

function play()
{
    $fullFunctionName = __NAMESPACE__.'\generateNumber';
    playGame($fullFunctionName, DESCRIPTION);
}
