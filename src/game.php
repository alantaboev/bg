<?php

namespace Bg\Game;

use function cli\line;
use function cli\prompt;

const GAME_STAGES = 3;

function play($gameRules, $questions)
{
    line('Welcome to the Brain Games!');
    line($gameRules);
    line(''); // empty line separator

    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line('');

    foreach ($questions as $question => $correctAnswer) {
        line('Question: %s', $question);
        $userAnswer = prompt('Your answer');

        if ($userAnswer !== $correctAnswer) {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $userAnswer, $correctAnswer);
            line('Let\'s try again, %s!', $name);
            exit();
        }

        line('Correct!');
    }
    line('Congratulations, %s!', $name);
}
