<?php

namespace Bg\Games\Prime;

use function Bg\Game\play;

use const Bg\Game\GAME_STAGES;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function run()
{
    $tasks = createTasks();
    play(DESCRIPTION, $tasks);
}

function createTasks()
{
    $tasks = [];
    while (count($tasks) < GAME_STAGES) {
        $question = rand(-10, 20);
        $answer = isPrime($question) ? 'yes' : 'no';
        $tasks[$question] = $answer;
    }
    return $tasks;
}

function isPrime($n)
{
    if ($n < 2) {
        return false;
    }

    for ($x = 2; $x <= sqrt($n); $x++) {
        if ($n % $x === 0) {
            return false;
        }
    }
    return true;
}
