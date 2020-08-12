<?php

namespace bg\games\gcd;

use function bg\game\play;

use const bg\game\GAME_STAGES;

const GAME_RULES = 'Find the greatest common divisor of given numbers.';

function run()
{
    $questions = getQuestions();
    play(GAME_RULES, $questions);
}

function getQuestions()
{
    $stages = [];
    for ($i = 0; $i < GAME_STAGES; $i++) {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $answer = gcd($number1, $number2);
        $quest = "{$number1} {$number2}";
        $stages[$quest] = (string)$answer;
    }
    return $stages;
}

function gcd($n1, $n2)
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
