<?php

require('src/functions.php');

// Задание 1

$arr = [
    0 => 'По своей сути рыбатекст является альтернативой',
    1 => 'lorem ipsum, который вызывает у некоторых людей недоумение'
];

task1($arr);
var_dump(task1($arr, true));
echo '<br>';
echo '<br>';

// Задание 2

echo task2( '/', 24, 3, 2);
echo '<br>';
echo task2( '-', 2, 2, 3);
echo '<br>';
echo task2( '+', 2, 3, 4, 5, 6, 7, 8, 9);
echo '<br>';
echo task2( '*', 2, 3, 4);

// Задание 3

task3(3, 6);
task3(5, 7);

// Задание 4

echo '<br>';
task4();
echo '<br>';

// Задание 5

task5('Карл у Клары украл Кораллы', 'Две бутылки лимонада');
echo '<br>';

// Задание 6

task6();



