<?php

namespace Code\Games\Even;

use function Code\Engine\playGame;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number)
{
    return $number % 2 === 0;
}

function generateNumber()
{
    $question = rand();
    $answer = isEven($question);

    return ['question' => $question, 'answer' => $answer];
}

function play()
{
    playGame(__NAMESPACE__ . '\generateNumber', DESCRIPTION);
}
