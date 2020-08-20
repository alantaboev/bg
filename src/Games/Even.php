<?php

namespace Bg\Games\Even;

use function Bg\Game\play;

use const Bg\Game\GAME_STAGES;

const GAME_RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function run()
{
    $questions = prepareQuestions();
    play(GAME_RULES, $questions);
}

function prepareQuestions()
{
    $questions = [];
    $i = 0;
    while ($i < GAME_STAGES) {
        $question = rand(0, 100);
        $answer = isEven($question) ? 'yes' : 'no';
        if (empty($questions[$question])) {
            $questions[$question] = $answer;
        }
        $i = count($questions);
    }
    return $questions;
}

function isEven($number)
{
    return $number % 2 === 0;
}
