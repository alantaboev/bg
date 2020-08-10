<?php

namespace bg\game;

use function cli\line;
use function cli\prompt;

const GAME_STAGES = 3;

function play($gameRules, $questions)
{
    line('Welcome to the Brain Games!');
    line($gameRules . "\n");

    $name = prompt('May I have your name?');
    line("Hello, %s!\n", $name);

    foreach ($questions as $question => $correctAnswer) {
        line('Question: ' . $question);
        $userAnswer = prompt('Your answer');

        if ($userAnswer === $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, %s!", $name);
            exit();
        }
    }
    line('Congratulations, %s!', $name);
}
