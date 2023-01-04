#!/usr/bin/env php
<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use function BrainGames\Engine\engine;
use function BrainGames\Cli\hello;
use function cli\line;

// Функция "НОД"
function gcd(int $a, int $b) {
    if ($b > $a) {
        $c = $a;
        $a = $b;
        $b = $c;
    }
    if ($a % $b === 0) {
        return $b;
    } else {
        return gcd($b, $a % $b);
    }
}

// Генерация вопросов с ответами
$quests = [];
$answers = [];
for ($i = 0; $i <= 2; $i += 1) {
    $randomNumberOne = rand(1, 100);
    $randomNumberTwo = rand(1, 100);
    $quest = "{$randomNumberOne} and {$randomNumberTwo}";
    $answer = gcd($randomNumberOne, $randomNumberTwo);
    $quests[] = $quest;
    $answers[] = $answer;
}

// Запуск игры
$userName = hello();
line("Find the greatest common divisor of given numbers.");
engine($quests, $answers, $userName);
