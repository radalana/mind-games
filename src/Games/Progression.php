<?php

namespace Code\Games\Progression;

use function Code\Engine\playGame;

const DESCRIPTION = 'What number is missing in the progression?';

function generateProgression(int $lengthOfProgression)
{
    $firstNumber = rand(-10, 10);
    $diff = rand(-10, 10);
    $progression = [];

    for ($i = 0; $i < $lengthOfProgression; $i++) {
        $progression[$i] = $firstNumber + ($i * $diff);
    }

    return $progression;
}

function generateQuestion()
{
    $lengthOfProgression = rand(5, 10);
    $possitionOfHiddenNumber = rand(0, $lengthOfProgression - 1);
    $progression = generateProgression($lengthOfProgression);

    $answer = $progression[$possitionOfHiddenNumber];
    $progression[$possitionOfHiddenNumber] = '..';
    return ['question' => implode(" ", $progression), 'answer' => $answer];
}

function play()
{
    playGame(__NAMESPACE__ . '\generateQuestion', DESCRIPTION);
}
