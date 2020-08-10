<?php

namespace bg\games\even;

use function bg\game\play;

use const bg\game\GAME_STAGES;

const GAME_RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function run()
{
    $questions = getQuestions();
    play(GAME_RULES, $questions);
}

function getQuestions()
{
    $correctAnswers = [];
    for ($i = 0; $i < GAME_STAGES; $i++) {
        $number = rand(0, 100);
        $answer = (isEven($number)) ? 'yes' : 'no';
        $correctAnswers[$number] = $answer;
    }
    return $correctAnswers;
}

function isEven($number)
{
    return $number % 2 === 0;
}
