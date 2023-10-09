<?php

namespace Code\Games\Even;

use function Code\Engine\playGame;

CONST DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number)
{
    return $number % 2 === 0;
}

function boolToYesNo(bool $bool)
{
    return $bool ? 'yes' : 'no';
}

function generateNumber()
{
    $question = rand();
    $answer = boolToYesNo(isEven($question));

    return ['question' => $question, 'answer' => $answer];
}

function play()
{
    playGame(__NAMESPACE__.'\generateNumber', DESCRIPTION);
}
