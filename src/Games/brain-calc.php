#!/usr/bin/env php
<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use function BrainGames\Engine\engine;
use function BrainGames\Cli\hello;
use function cli\line;

// Определение функций внутри массива
$functions = [
        function (int $a, int $b) {
            return $a + $b;
        },
        function (int $a, int $b) {
            return $a - $b;
        },
        function (int $a, int $b) {
            return $a * $b;
        }
        ];
$operand = ['+', '-', '*'];
$quests = [];
$answers = [];
for ($i = 0; $i <= 2; $i += 1) {
    $randomNumberOne = rand(1, 100);
    $randomNumberTwo = rand(1, 100);
    $quest = "{$randomNumberOne} {$operand[$i]} {$randomNumberTwo}";
    $answer = $functions[$i]($randomNumberOne, $randomNumberTwo);
    $quests[] = $quest;
    $answers[] = $answer;
}
// Запуск игры
$userName = hello();
line('Answer "yes" if the number is even, otherwise answer "no".');
engine($quests, $answers, $userName);
