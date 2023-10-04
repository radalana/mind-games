<?php

namespace Code\Games\Gcd;

use function Code\Engine\playGame;

function generateQuestion() 
{
    $firstNumber = rand(1, 50);
    $secondNumber = rand(1, 50);
    return "{$firstNumber} {$secondNumber}";
}

function calculateGreatestCommonDeviser (string $stringTask) {
    $arrayNumbers = explode(" ", $stringTask);
    $firstNumber = (int) $arrayNumbers[0];
    $secondNumber = (int) $arrayNumbers[1];

    if ($firstNumber === 0 || $secondNumber === 0) {
        return $firstNumber + $secondNumber;
    }
    while ($firstNumber != $secondNumber) {
        if ($firstNumber > $secondNumber) {
            $firstNumber = $firstNumber - $secondNumber;
        } else {
            $secondNumber = $secondNumber - $firstNumber;
        }
    }

    return $firstNumber;
}

function findGreatestCommonDeviser()
{
     $task = 'Find the greatest common divisor of given numbers.';
    playGame('Code\Games\Gcd\generateQuestion', 'Code\Games\Gcd\calculateGreatestCommonDeviser', $task);
}
