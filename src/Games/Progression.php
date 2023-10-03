<?php

namespace Code\Games\Progression;

use function Code\Engine\playGame;
use function cli\line;

function generateProgression(int $lengthOfProgression)
{
    $firstNumber = rand(-10, 10);
    $progression = [$firstNumber];

    $diff = rand(-10, 10);

    for ($i = 1; $i < $lengthOfProgression; $i++) {
        $progression[$i] = $progression[$i - 1] + $diff;
    }

    return $progression;
}

function progressionToString(array $progression, int $lengthOfProgression, int $possitionOfHiddenNumber): string
{
    $array = [];
    for ($i = 0; $i <  $lengthOfProgression; $i++) {
        if ($i === $possitionOfHiddenNumber) {
            $array[] = '..';
        } else {
            $array[] = "{$progression[$i]}";
        }
    }
    return implode(" ", $array);
}

function playArithmeticProgression()
{
    
    $task = 'What number is missing in the progression?';
    $answer = null;
    $generateQuestion = function () use (&$answer) {
        $lengthOfProgression = rand(5, 10);
        $possitionOfHiddenNumber = rand(0, $lengthOfProgression - 1);
        $progression = generateProgression($lengthOfProgression);
        $answer = $progression[$possitionOfHiddenNumber];
        return progressionToString($progression, $lengthOfProgression, $possitionOfHiddenNumber);
    };

    $findNumber = function (string $progression) use (&$answer) {
        return $answer;
    };
    playGame($generateQuestion, $findNumber, $task);
}
