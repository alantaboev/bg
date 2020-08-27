<?php

namespace Bg\Games\Gcd;

use function Bg\Game\play;

use const Bg\Game\GAME_STAGES;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function run()
{
    $tasks = createTasks();
    play(DESCRIPTION, $tasks);
}

function createTasks()
{
    $tasks = [];
    while (count($tasks) < GAME_STAGES) {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $answer = calcGcd($number1, $number2);
        $question = "{$number1} {$number2}";
        $tasks[$question] = (string)$answer;
    }
    return $tasks;
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
