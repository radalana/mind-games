/*
*Brain Games CLI
*
*This script is a simple interactive command line interface (CLI) 
*that greets the user and asks for their name.
*It the displays a greeting with the user's name.
*/
<?php
namespace Brain\Games\Cli;
require_once __DIR__ . '../../vendor/autoload.php';



use function cli\line;
use function cli\prompt;

function greet()
{
line('Welcome to the Brain Game!');
$name =  prompt('May I have your name?');
line("Hello, %s!", $name);
}
