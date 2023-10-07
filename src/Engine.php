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

function inputToBool(string $input)
{
    if ($input === 'yes') {
        return true;
    } else if ($input === 'no') {
        return false;
    } else {
        return $input;
    }
}

function boolToAnswer(bool $bool): string
{
    $result = $bool === true ? 'yes' : 'no';
    return $result;
}
function playGame(string $generateQuestion, string $task)
{
    $name = greet();
    line($task);

    $numberOfRounds = 3;
    $currentRound = 0;

    for ($currentRound; $currentRound < $numberOfRounds; $currentRound++) {
        $questionAnswer = $generateQuestion();
        $question = $questionAnswer['question'];
        $correctAnswer = $questionAnswer['answer'];
        line('Question: %s', (string) $question);
        $userInput = prompt('Your answer');
        $userAnswer = inputToBool($userInput);
        $outputAnswer = gettype($correctAnswer) == 'bool' ? boolToAnswer($correctAnswer) : $correctAnswer;
        if ($userAnswer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userInput, $outputAnswer);
            line("Let's try again, %s!", $name);
            return;
        }

        line('Correct!');
    }

    line('Congratulations, %s!', $name);
}
