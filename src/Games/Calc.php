<?php

namespace Bg\Games\Calc;

use function Bg\Game\play;

use const Bg\Game\GAME_STAGES;

const DESCRIPTION = 'What is the result of the expression?';
const MATH_SYMBOL = ['+', '-', '*'];

function run()
{
    $tasks = createTasks();
    play(DESCRIPTION, $tasks);
}

function createTasks()
{
    $tasks = [];
    while (count($tasks) < GAME_STAGES) {
        $number1 = rand(1, 10);
        $number2 = rand(1, 10);
        $action = MATH_SYMBOL[array_rand(MATH_SYMBOL)];
        $question = "{$number1} {$action} {$number2}";
        $answer = calculate($number1, $number2, $action);
        $tasks[$question] = (string)$answer;
    }
    return $tasks;
}

/**
 * @param $num1
 * @param $num2
 * @param $action
 * @return float|int
 * @throws \Exception
 */
function calculate($num1, $num2, $action)
{
    switch ($action) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            throw new \Exception("Unknown arithmetic action '{$action}'");
    }
}
