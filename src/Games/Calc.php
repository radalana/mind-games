<?php

namespace Brain\Games\Calc;

require_once __DIR__ . '/../../vendor/autoload.php';
#use function Brain\Games\Engine\greet;
use function Brain\Games\Engine\launch;

#$name = greet(); #удалить позже за ненадобность так как все уже есть в функции launch

#здесь нужно использовать launch из Brain\Games\Engine.php
# и создать нужны параметры для launch($gameRules, $qusetion, $correctAnswer)

$gameRule = 'What is the result of the expression?';

#$question лучше риализовать через функцию которая генерирует строку математиечского выражения, так как при каждом вызове буде создана новая строка

if (!function_exists('generateMathExpression')){
    function generateMathExpression() : string
{
    $firstNumber = rand(0, 100);
    $secondNumber = rand(0, 100);

    $operations = ['+', '-', '*'];

    $expression = "{$firstNumber} {$operations[rand(0,2)]} {$secondNumber}";

    return $expression;
}

}else{
    print_r('пиздец');
}


if (!function_exists('calculateExpression')){
    function calculateExpression($expression) : ?int
    {
        #1. разбить строку на слова
        $words = explode(" ", $expression);
    
        $firstNumber = (int) $words[0];
        $secondNumber = (int) $words[2];
    
        $operation = $words[1];
    
    
        switch($operation)
        {
            case '+':
                return $firstNumber + $secondNumber;
            case '-':
                return $firstNumber - $secondNumber;
            case '*':
                return $firstNumber * $secondNumber;
            default:
                return null;        
        }




}


}






