<?php

namespace bg\games\progression;

use function bg\game\play;

use const bg\game\GAME_STAGES;

const GAME_RULES = 'What number is missing in the progression?';
const LONG_PROGRESSION = 10;

function run()
{
    $questions = prepareQuestions();
    play(GAME_RULES, $questions);
}

function prepareQuestions()
{
    $stages = [];
    for ($i = 0; $i < GAME_STAGES; $i++) {
        $progression = createProgression();
        $skip = array_rand($progression);
        $answer = $progression[$skip];

        $progression[$skip] = '..';

        $quest = implode(' ', $progression);
        $stages[$quest] = (string)$answer;
    }
    return $stages;
}

function createProgression()
{
    $first = rand(0, 20);
    $step = rand(1, 10);
    $result[] = $first;
    for ($i = 0, $current = $first; $i < LONG_PROGRESSION; $i++) {
        $current += $step;
        $result[] = $current;
    }
    return $result;
}
