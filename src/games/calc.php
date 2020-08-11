<?php

namespace bg\games\calc;

use function bg\game\play;

use const bg\game\GAME_STAGES;

const GAME_RULES = 'What is the result of the expression?';
const MATH_SYMBOLS = ['+', '-', '*'];

function run()
{
    $questions = getQuestions();
    play(GAME_RULES, $questions);
}

function getQuestions()
{
    $stages = [];
    for ($i = 0; $i < GAME_STAGES; $i++) {
        $number1 = rand(1, 10);
        $number2 = rand(1, 10);
        $action = MATH_SYMBOLS[array_rand(MATH_SYMBOLS)];
        $quest = "{$number1} {$action} {$number2}";
        // eval вроде как не рекомендуется использовать
//        eval('$answer = ' . $number1 . $action . $number2 . ';');

        switch ($action) {
            case '+':
                $answer = $number1 + $number2;
                break;
            case '-':
                $answer = $number1 - $number2;
                break;
            case '*':
                $answer = $number1 * $number2;
                break;
        }

        $stages[$quest] = (string)$answer;
    }
    return $stages;
}

function getAction($symbols)
{
    return array_rand($symbols);
}
