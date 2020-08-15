<?php

namespace Bg\Games\Gcd;

use function Bg\Game\play;

use const Bg\Game\GAME_STAGES;

const GAME_RULES = 'Find the greatest common divisor of given numbers.';

function run()
{
    $questions = prepareQuestions();
    play(GAME_RULES, $questions);
}

function prepareQuestions()
{
    $questions = [];
    for ($i = 0; $i < GAME_STAGES; $i++) {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $answer = calcGcd($number1, $number2);
        $question = "{$number1} {$number2}";

        if (empty($questions[$question])) {
            $questions[$question] = (string)$answer;
        } else {
            $i--;
        }
    }
    return $questions;
}

function calcGcd($n1, $n2)
{
    while (true) {
        if ($n1 == $n2) {
            return $n2;
        }
        if ($n1 > $n2) {
            $n1 -= $n2;
        } else {
            $n2 -= $n1;
        }
    }
}
