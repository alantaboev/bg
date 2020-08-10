<?php

namespace bg\games\calc;

use const bg\game\GAME_STAGES;

const GAME_RULES = 'What is the result of the expression?';

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
