<?php

namespace Brain\Games\Gcd;

require_once __DIR__ . '/../../vendor/autoload.php';
use function Brain\Games\Engine\greet;
use function cli\line;
use function cli\prompt;

function calculateGreatestCommonDeviser($firstNumber, $secondNumber):int
{
    if ($firstNumber === 0 || $secondNumber === 0){
        return $firstNumber + $secondNumber;
    }
    while ($firstNumber != $secondNumber)
    {
        if ($firstNumber > $secondNumber)
        {
            $firstNumber = $firstNumber - $secondNumber;
        }else{
            $secondNumber = $secondNumber - $firstNumber;
        }
    }

    return $firstNumber;
}

function findGreatestCommonDeviser(){
    $name = greet();
    line('Find the greatest common divisor of given numbers.');

    $numberOfRounds = 3;
    $currentRound = 0;

    for($currentRound; $currentRound < $numberOfRounds; $currentRound++)
    {
        $firstNumber = rand(0, 50);
        $secondNumber = rand(0, 50);
        line('Question: %d %d', $firstNumber, $secondNumber);

        $userAnswer = prompt('Your answer');
        $correctAnswer = calculateGreatestCommonDeviser($firstNumber, $secondNumber);

        if ($userAnswer != $correctAnswer)
        {
            line("'%d' is wrong answer ;(. Correct anwer was '%d'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            break;
        }
    }

    if ($currentRound === $numberOfRounds){
        line('Congratulations, %s!', $name);
    }
}