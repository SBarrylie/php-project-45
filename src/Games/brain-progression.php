#!/usr/bin/env php
<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use function BrainGames\Engine\engine;
use function BrainGames\Cli\hello;
use function cli\line;

function progressionGenerator()
{
    $progressionLength = rand(5, 15);
    $progressionStart = rand(-30, 30);
    $progressionStep = rand(2, 12);
    $skipNumber = rand(1, $progressionLength);
    $quest = '';
    $answer = 0;
    for ($i = 0; $i <= $progressionLength; $i += 1) {
        if ($i == $skipNumber) {
            $quest = "{$quest} ..";
            $answer = $progressionStart;
        } else {
            $quest = "{$quest} {$progressionStart}";
        }
        $progressionStart += $progressionStep;
    }
    return [$quest, $answer];
}

// Генерация вопросов с ответами
$quests = [];
$answers = [];
for ($i = 0; $i <= 2; $i += 1) {
    $result = progressionGenerator();
    $quest = substr($result[0], 1, strlen($result[0]));
    $quests[] = $quest;
    $answers[] = $result[1];
}

// Запуск игры
$userName = hello();
line("What number is missing in the progression?");
engine($quests, $answers, $userName);
