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
    for ($i = 0; $i < GAME_STAGES; $i++) {
        $progression = createProgression(rand(0, 20), rand(1, 10));

        $skip = array_rand($progression);
        $answer = $progression[$skip];
        $progression[$skip] = '..';

        $question = implode(' ', $progression);

        if (empty($questions[$question])) {
            $questions[$question] = (string)$answer;
        } else {
            $i--;
        }
    }
    return $questions;
}

function createProgression($first, $step)
{
    $result[] = $first;
    for ($i = 0, $current = $first; $i < PROGRESSION_LENGTH; $i++) {
        $current += $step;
        $result[] = $current;
    }
    return $result;
}
