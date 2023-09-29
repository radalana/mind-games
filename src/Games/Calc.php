<?php

namespace Code\Games\Calc;

use function Code\Engine\playGame;
use function cli\line;

function playCalculation()
{
    $printTask = function () {
        line('What is the result of the expression?');
    };


    $genereteExpression = function () {
        $firstNumber  = rand(0, 100);
        $secondNumber = rand(0, 100);

        $operations = ['+', '-', '*'];
        $operation = $operations[rand(0, 2)];

        return "{$firstNumber} {$operation} {$secondNumber}";
    };

    $calculateExpression = function (string $stringExpression) {
        $arrayExpression = explode(" ", $stringExpression);
        $firstNumber = $arrayExpression[0];
        $secondNumber = $arrayExpression[2];

        $operation = $arrayExpression[1];

        switch ($operation) {
            case '+':
                return $firstNumber + $secondNumber;
            case '-':
                return $firstNumber - $secondNumber;
            case '*':
                return $firstNumber * $secondNumber;
            default:
                return throw new \Exception('Error: not valid operation!');
        }
    };

    playGame($genereteExpression, $calculateExpression, $printTask);
}
