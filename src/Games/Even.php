<?php

namespace Bg\Games\Even;

use function Bg\Game\play;

use const Bg\Game\GAME_STAGES;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function run()
{
    $tasks = createTasks();
    play(DESCRIPTION, $tasks);
}

function createTasks()
{
    $tasks = [];
    while (count($tasks) < GAME_STAGES) {
        $question = rand(0, 100);
        $answer = isEven($question) ? 'yes' : 'no';
        $tasks[$question] = $answer;
    }
    return $tasks;
}

function isEven($number)
{
    return $number % 2 === 0;
}
