<?php

namespace Bg\Games\Calc;

use function Bg\Game\play;

use const Bg\Game\GAME_STAGES;

const GAME_RULES = 'What is the result of the expression?';
const MATH_SYMBOLS = ['+', '-', '*'];

function run()
{
    $questions = prepareQuestions();
    play(GAME_RULES, $questions);
}

function prepareQuestions()
{
    $questions = [];
    while (count($questions) < GAME_STAGES) {
        $number1 = rand(1, 10);
        $number2 = rand(1, 10);
        $action = MATH_SYMBOLS[array_rand(MATH_SYMBOLS)];
        $question = "{$number1} {$action} {$number2}";
        $answer = calculate($number1, $number2, $action);
        $questions[$question] = (string)$answer;
    }
    return $questions;
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
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
        default:
            throw new \Exception("Unknown arithmetic action '{$action}'");
    }
    return $result;
}
