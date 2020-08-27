<?php

namespace Bg\Games\Progression;

use function Bg\Game\play;

use const Bg\Game\GAME_STAGES;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function run()
{
    $tasks = createTasks();
    play(DESCRIPTION, $tasks);
}

function createTasks()
{
    $tasks = [];
    while (count($tasks) < GAME_STAGES) {
        $progression = createProgression(rand(0, 20), rand(1, 10), PROGRESSION_LENGTH);

        $skippedIndex = array_rand($progression);
        $answer = $progression[$skippedIndex];
        $progression[$skippedIndex] = '..';

        $question = implode(' ', $progression);
        $tasks[$question] = (string)$answer;
    }
    return $tasks;
}

function createProgression($first, $step, $progressionLength)
{
    $result[] = $first;
    for ($i = 0, $current = $first; $i < $progressionLength; $i++) {
        $current += $step;
        $result[] = $current;
    }
    return $result;
}
