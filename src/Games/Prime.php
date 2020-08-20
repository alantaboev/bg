<?php

namespace Bg\Games\Prime;

use function Bg\Game\play;

use const Bg\Game\GAME_STAGES;

const GAME_RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

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
        $question = rand(-10, 20);
        $answer = isPrime($question) ? 'yes' : 'no';
        if (empty($questions[$question])) {
            $questions[$question] = $answer;
        }
        $i = count($questions);
    }
    return $questions;
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
