<?php

namespace Code\Games\Even;

use function Code\Engine\playGame;
use function cli\line;

function playEven()
{
    $isEven = function (int $number) {
        if ($number % 2 === 0) {
            return 'yes';
        }
    
        return 'no';
    };
    
    $generateNumber = function () {
        return rand();
    };
    
    $printTask = function () {
        line('Answer "yes" if the number is even, otherwise answer "no".');
    };

    playGame($generateNumber, $isEven, $printTask);
}
