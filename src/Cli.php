<?php
namespace Brain\Games\Cli;

require_once __DIR__ . '/../vendor/autoload.php';
>>>>>>> branch1

use function cli\line;
use function cli\prompt;

function greet(){
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}


