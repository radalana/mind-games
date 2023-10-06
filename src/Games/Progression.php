<?php

namespace Code\Games\Progression;

use function Code\Engine\playGame;



function generateProgression(int $lengthOfProgression)
{
    $firstNumber = rand(-10, 10);
    $progression = [$firstNumber];

    $diff = rand(-10, 10);

    for ($i = 1; $i < $lengthOfProgression; $i++) {
        $progression[$i] = $firstNumber + ($i * $diff);
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
function generateQuestion()
{
    $lengthOfProgression = rand(5, 10);
    $possitionOfHiddenNumber = rand(0, $lengthOfProgression - 1);
    $progression = generateProgression($lengthOfProgression);

    $answer = $progression[$possitionOfHiddenNumber];
    $qustion =  progressionToString($progression, $lengthOfProgression, $possitionOfHiddenNumber);
    return ['question' => $qustion, 'answer' => $answer];
}

function playArithmeticProgression()
{
    $task = 'What number is missing in the progression?';
    playGame('Code\Games\Progression\generateQuestion', $task);
}
