<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;


function greet() : string{ #удалить эту функци, не удалять пока не убeреться вызов этой функции из bin/brain-calc!!!
    
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    
    return $name;
}



#в $question передать результат функций которые раелзованы в Games/Calc.php или Games/Even.php соотвественно



/*
13 sep

передать в параметры функции launch $qusetion и $correctAnswer плохая идея, так как в цикле раундов должен быть каждый раз новый вопрос
тогда стоит передать в параметр функцию

*/
function launch ($gameRule, $question, $calculateAnswer){
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $numberOfRounds = 3;
    $currentRound = 1;

    for($currentRound; $currentRound < $numberOfRounds; $currentRound++)
    {
        #введение правил displayGameRule() или передать в параметре уже как готовую строку, без передачи функции в параметре
        $rules = $gameRule;
        line($rules);
        #вывод вопроса;

        $expression = $calculateAnswer();

        line('Qustion: %s', $expression);

        $correctAnswer = $calculateAnswer($expression);

        $userAnswer = prompt('Your answer');

        if ($userAnswer != $correctAnswer)
        {
            line("'%s' is wrong answer ;(. Correct anwer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
                break;
        }
    }

    if ($currentRound === $numberOfRounds){
        line('Congratulations, %s!', $name);
    }
}


