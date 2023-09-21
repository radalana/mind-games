<?php

namespace Code\Games\Calc;

use function Code\Engine\greet;
use function cli\line;
use function cli\prompt;

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
            return null;
    }
}



function playCalculation()
{
    $name = greet();
    print_r('What is the result of the expression?');

    $numberOfRounds = 3;
    $currentRound = 0;

    $operations = ['+', '-', '*'];
    for ($currentRound; $currentRound < $numberOfRounds; $currentRound++) {
        $firstNumber  = rand(0, 100);
        $secondNumber = rand(0, 100);
        $operation = $operations[rand(0, 2)];
        line('Question: %d %s %d', $firstNumber, $operation, $secondNumber);

        $userAnswer = prompt('Your answer');
        $correctAnswer = calculateExpression($firstNumber, $secondNumber, $operation);

        if ($userAnswer != $correctAnswer) {
            line("'%d' is wrong answer ;(. Correct anwer was '%d'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            break;
        }

        line('Correct!');
    }

    if ($currentRound === $numberOfRounds) {
        line('Congratulations, %s!', $name);
    }
}
