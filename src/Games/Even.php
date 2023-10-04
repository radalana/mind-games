<?php

namespace Code\Games\Even;

use function Code\Engine\playGame;

function isEven(int $number)
{
    if ($number % 2 === 0) {
        return 'yes';
    }
    return 'no';
}

function generateNumber()
{
    return rand();
}

function playEven()
{
    $task = 'Answer "yes" if the number is even, otherwise answer "no".';
    playGame('Code\Games\Even\generateNumber', 'Code\Games\Even\isEven', $task);
}
