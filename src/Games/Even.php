<?php

namespace Code\Games\Even;

use function Code\Engine\playGame;

CONST DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number)
{
    return $number % 2 === 0 ? true : false;
}

function generateNumber()
{
    $question = rand();
    $answer = isEven($question);

    return ['question' => $question, 'answer' => $answer];
}

function playEven()
{
    playGame('Code\Games\Even\generateNumber', DESCRIPTION);
}
