<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\hello;
use function cli\line;
use function cli\prompt;

function engine(array $quests, array $answers, string $userName)
{
    $correct_answers = 0;
    for ($i = 0; $i < 3; $i++) {
        line("Question: %s", $quests[$i]);
        $user_answer = prompt("Your answer");

        if ($user_answer == $answers[$i]) {
            line("Correct!");
            $correct_answers += 1;
        } else {
            line("{$user_answer} is wrong answer ;(. Correct answer was {$answers[$i]}.");
            line("Let's try again, %s!", $userName);
            break;
        }
    }
    if ($correct_answers == 3) {
        line("Congratulations, %s!", $userName);
    }
}
