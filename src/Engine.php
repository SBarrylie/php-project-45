<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\hello;
use function cli\line;
use function cli\prompt;

function engine($quests, $answers) {
    $userName = hello();
    $numberOfResponses = 0;
    
    while ($numberOfResponses < 3) {
        line("Question: %s", $quests);
        $user_answer = prompt("Your answer");

        if($user_answer == $answers) {
            line("Correct!");
                $numberOfResponses +=1;
        } else {
            line("{$user_answer} is wrong answer ;(. Correct answer was {$answers}.");
            line("Let`s try again, %s!", $userName);
             break;
        }

        if($numberOfResponses === 3) {
            line("Congratulations %s!", $userName);
        }

}