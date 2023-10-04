<?php

namespace Code\Games\Calc;

use function Code\Engine\playGame;

function genereteExpression()
{
    $firstNumber  = rand(0, 100);
    $secondNumber = rand(0, 100);

    $operations = ['+', '-', '*'];
    $operation = $operations[rand(0, 2)];

    return "{$firstNumber} {$operation} {$secondNumber}";
}

function calculateExpression(string $stringExpression)
{
    $arrayExpression = explode(" ", $stringExpression);
    $firstNumber = (int) $arrayExpression[0];
    $secondNumber = (int) $arrayExpression[2];

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
}

function playCalculation()
{
    $task = 'What is the result of the expression?';
    playGame('Code\Games\Calc\genereteExpression', 'Code\Games\Calc\calculateExpression', $task);
}
