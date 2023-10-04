<?php

namespace Code\Games\Prime;

use function Code\Engine\playGame;

function generateNumber()
{
    return rand(1, 3571);
}

function isPrime(int $number)
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
    $task = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    playGame('Code\Games\Prime\generateNumber', 'Code\Games\Prime\isPrime', $task);
}
