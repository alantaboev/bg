<?php

namespace bg\even;

use function cli\line;
use function cli\prompt;

const QUESTIONS = 3;
const GAME_RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function play($questions)
{
    line('Welcome to the Brain Games!');
    line(GAME_RULES . "\n");

    $name = prompt('May I have your name?');
    line("Hello, %s!\n", $name);

    foreach ($questions as $question => $correctAnswer) {
        line('Question: ' . $question);
        $userAnswer = prompt('Your answer');

        if ($userAnswer === $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line('Let\'s try again, Bill!');
            exit();
        }
    }
    line('Congratulations, %s!', $name);
}

function getQA()
{
    $correctAnswers = [];
    for ($i = 0; $i < QUESTIONS; $i++) {
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
