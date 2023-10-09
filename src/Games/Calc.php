<?php

namespace Code\Games\Calc;

use function Code\Engine\playGame;

const DESCRIPTION = 'What is the result of the expression?';

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
            throw new \Exception('Invalid operation');
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


function play()
{
    playGame(__NAMESPACE__ . '\generateExpression', DESCRIPTION);
}
