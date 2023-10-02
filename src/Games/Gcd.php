<?php

namespace Code\Games\Gcd;

use function Code\Engine\playGame;
use function cli\line;

function findGreatestCommonDeviser()
{
    $printTask = function () {
        line('Find the greatest common divisor of given numbers.');
    };
    $generateQuestion = function () {
        $firstNumber = rand(1, 50);
        $secondNumber = rand(1, 50);
        return "{$firstNumber} {$secondNumber}";
    };

    $calculateGreatestCommonDeviser = function (string $stringTask) {
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
    };

    playGame($generateQuestion, $calculateGreatestCommonDeviser, $printTask);
}
