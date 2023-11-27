<?php

namespace Code\Games\Prime;

use function Code\Engine\playGame;
use function Code\BooleanConverter\convertBool;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number)
{
    if ($number === 1) {
        return false;
    }

    if (($number % 2 === 0) && ($number != 2)) {
        return false;
    }

    $border = round(sqrt($number));

    $potentialDivisor = 3;
    /*
      начало с 3, чтобы при прибавление шага +2, цикл прохдил только по нечетным числам
    */

    for ($potentialDivisor; $potentialDivisor <= $border; $potentialDivisor += 2) {
        if ($number % $potentialDivisor == 0) {
            return false;
        }
    }

    return true;
}

function generateNumber()
{
    $question =  rand(1, 3571);
    $answer = isPrime($question);

    return ['question' => $question, 'answer' => convertBool($answer)];
}

function play()
{
    playGame(__NAMESPACE__ . '\generateNumber', DESCRIPTION);
}
