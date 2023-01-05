#!/usr/bin/env php
<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use function BrainGames\Engine\engine;
use function BrainGames\Cli\hello;
use function cli\line;

// Функция "НОД"

function generateNumber(){
    $work = true;
    $result = 0;
    while($work) {
        $randomNumber = rand(2, 151);
        if ($randomNumber == 2) {
            $result = $randomNumber;
            $work = false;
        } elseif ($randomNumber % 2 != 0) {
            $result = $randomNumber;
            $work = false;
        }
    }
    return $result;
}

function isPrime(int $num){
    $result = true;
    for ($i = 2; $i < $num; $i += 1){
        if ($num % $i == 0){
            $result = false;
            break;
        }
    }
    return $result;
}
// Генерация вопросов с ответами
$quests = [];
$answers = [];
for ($i = 0; $i <= 2; $i += 1) {
    $quest = generateNumber();
    $answer = isPrime($quest) ? "yes" : "no";
    $quests[] = $quest;
    $answers[] = $answer;
}

// Запуск игры
$userName = hello();
line('Answer "yes" if given number is prime. Otherwise answer "no".');
engine($quests, $answers, $userName);
