<?php

namespace Code\Games\Gcd;

use function Code\Engine\playGame;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function calculateGreatestCommonDivisor(int $firstNumber, int $secondNumber)
{
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

function generateQuestion()
{
    $firstNumber = rand(1, 50);
    $secondNumber = rand(1, 50);

    $answer = calculateGreatestCommonDiviser($firstNumber, $secondNumber);
    return ['question' => "{$firstNumber} {$secondNumber}", 'answer' => $answer];
}

function play()
{
    playGame(__NAMESPACE__ . '\generateQuestion', DESCRIPTION);
}
