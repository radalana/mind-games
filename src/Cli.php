<?php
/**
 * Brain-Games CLI
 * greets user
 * php version 8.1.2
 
 * @category CLI
 * @package  Code
 * @author   Sveta <radalana415@gmail.com>
 * @link     https://github.com/radalana/php-project-45.git
 */
namespace Brain\Games\Cli;
require_once __DIR__ . '../../vendor/autoload.php';



use function cli\line;
use function cli\prompt;

/**
 * Asks user's name und display a greeting with the user's name
 
 * @return void
 */
function greet()
{
    line('Welcome to the Brain Game!');
    $name =  prompt('May I have your name?');
    line("Hello, %s!", $name);
}
