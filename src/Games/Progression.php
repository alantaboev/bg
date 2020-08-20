<?php

namespace Bg\Games\Progression;

use function Bg\Game\play;

use const Bg\Game\GAME_STAGES;

const GAME_RULES = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function run()
{
    $questions = prepareQuestions();
    play(GAME_RULES, $questions);
}

function prepareQuestions()
{
    $questions = [];
    while (count($questions) < GAME_STAGES) {
        $progression = createProgression(rand(0, 20), rand(1, 10), PROGRESSION_LENGTH);

        $skip = array_rand($progression);
        $answer = $progression[$skip];
        $progression[$skip] = '..';

        $question = implode(' ', $progression);
        $questions[$question] = (string)$answer;
    }
    return $questions;
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
