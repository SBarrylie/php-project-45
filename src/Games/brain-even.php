#!/usr/bin/env php
<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use function BrainGames\Engine\engine;
use function BrainGames\Cli\hello;
use function cli\line;
use function cli\prompt;

// Генерация вопросов и ответов
$quests = [];
$answers = [];
for ($i = 0; $i <= 2; $i += 1) {
    $randomNumber = rand(1, 100);
    $answer = $randomNumber % 2 == 0 ? 'yes' : 'no';
    $quests[] = $randomNumber;
    $answers[] = $answer;
}
// Запуск игры
$userName = hello();
line('Answer "yes" if the number is even, otherwise answer "no".');
engine($quests, $answers, $userName);
