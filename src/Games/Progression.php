<?php

namespace Brain\Games\Progression;

require_once __DIR__ . '/../../vendor/autoload.php';

use function Brain\Games\Engine\greet;
use function cli\line;
use function cli\prompt;

function generateProgression($lengthOfProgression)
{
    $firstNumber = rand(-10, 10);
    $progression = [$firstNumber];

    $diff = rand(-10, 10);

    for ($i = 1; $i < $lengthOfProgression; $i++)
    {
        $progression[$i] = $progression[$i-1] + $diff;
    }

    return $progression;

}

function printQuestion($progression, $lengthOfProgression, $possitionOfHiddenNumber)
{
    print_r('Question: ');

    for ($i = 0; $i <  $lengthOfProgression; $i++)
    {
        if ($i === $possitionOfHiddenNumber)
        {
            print_r('.. ');
        }else{
            print_r("{$progression[$i]} ");
        }
    }

    print_r("\n");
}

function playArithmeticProgression(){
    $name = greet();

    $numberOfRounds = 3;
    $currentRound = 0;

    line('What number is missing in the progression?');
    for($currentRound; $currentRound < $numberOfRounds; $currentRound++)
    {
        

        $lengthOfProgression = rand(5, 10);
        $possitionOfHiddenNumber = rand(0, $lengthOfProgression-1);
        $progression = generateProgression($lengthOfProgression);

        printQuestion($progression, $lengthOfProgression, $possitionOfHiddenNumber);

        $userAnswer = prompt('Your answer');
        $correctAnswer = $progression[$possitionOfHiddenNumber];

        if ($userAnswer != $correctAnswer)
        {
            line("'%d is wrong answer ;(. Correct anwer was '%d'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            break;
        }
    }
    
    
    if ($currentRound === $numberOfRounds){
        line('Congratulations, %s!', $name);
    }
}