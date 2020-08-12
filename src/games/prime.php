<?php

namespace bg\games\prime;

use function bg\game\play;

use const bg\game\GAME_STAGES;

const GAME_RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function run()
{
    $questions = prepareQuestions();
    play(GAME_RULES, $questions);
}

function prepareQuestions()
{
    $stages = [];
    for ($i = 0; $i < GAME_STAGES; $i++) {
        $number = rand(1, 10);
        $answer = (isPrime($number)) ? 'yes' : 'no';
        $stages[$number] = $answer;
    }
    return $stages;
}

function isPrime($n)
{
    for ($x = 2; $x <= sqrt($n); $x++) {
        if ($n % $x === 0) {
            return false;
        }
    }
    return true;
}
