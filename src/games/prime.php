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
    for ($i = 0; $i < GAME_STAGES; $i++) {
        $question = rand(-20, 20);
        $answer = isPrime($question) ? 'yes' : 'no';

        if (empty($questions[$question])) {
            $questions[$question] = $answer;
        } else {
            $i--;
        }
    }
    return $questions;
}

function isPrime($n)
{
    $n = abs($n);

    if (in_array($n, [0, 1])) {
        return false;
    }

    for ($x = 2; $x <= sqrt($n); $x++) {
        if ($n % $x === 0) {
            return false;
        }
    }
    return true;
}
