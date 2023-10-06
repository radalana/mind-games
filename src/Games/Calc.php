<?php

namespace Code\Games\Calc;

use function Code\Engine\playGame;

function calculateExpression(int $firstNumber, int $secondNumber, string $operation)
{
    switch ($operation) {
        case '+':
            return $firstNumber + $secondNumber;
        case '-':
            return $firstNumber - $secondNumber;
        case '*':
            return $firstNumber * $secondNumber;
        default:
            ;
    }
}

function generateExpression()
{
    $firstNumber = rand(-100, 100);
    $secondNumber = rand(-100, 100);
    $operations = ['+', '-', '*'];
    $operationIndex = rand(0, 2);

    $answer = calculateExpression($firstNumber, $secondNumber, $operations[$operationIndex]);
    $result = ['question' => "{$firstNumber} {$operations[$operationIndex]} {$secondNumber}", 'answer' => $answer];

    return $result;
}


function playCalculation()
{
    $task = 'What is the result of the expression?';
    playGame('Code\Games\Calc\generateExpression', $task);
}
