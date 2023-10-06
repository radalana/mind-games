<?php

namespace Code\Engine;

use function cli\line;
use function cli\prompt;

function greet(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

/*
function boolToanswer($input)
{
    $type = gettype($input);
    if ($type === 'bool') {
        return $input === true ? 'yes' : 'no';
    }
    return $input;
}
*/

function inputToBool($input)
{   
    #не switch, для строгого сравнения
    if ($input === 'yes') {
        return true;
    } else if ($input === 'no') {
        return false;
    } else {
        return $input;
    }
}

function boolToAnswer ($bool) {
    if ($bool === true) {
        return 'yes';
    }else if ($bool === false) {
        return 'no';
    } else {
        return $bool;
    }
}
function playGame(string $generateQuestion, string $task)
{
    $name = greet();
    line($task);

    $numberOfRounds = 3;
    $currentRound = 0;

    for ($currentRound; $currentRound < $numberOfRounds; $currentRound++) {
        #$question = $generateQuestion()[];
        $questionAnswer = $generateQuestion();
        $question = $questionAnswer['question'];
        $correctAnswer = $questionAnswer['answer'];
        line('Question: %s', (string) $question);
        $userInput = prompt('Your answer');
        $userAnswer = inputToBool($userInput);

        #$correctAnswer = $checkAnswer($question);
        if ($userAnswer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userInput, boolToAnswer($correctAnswer));
            line("Let's try again, %s!", $name);
            return;
        }

        line('Correct!');
    }

    line('Congratulations, %s!', $name);
    
}
