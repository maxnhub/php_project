<?php

require('src/functions.php');

// Задание 1

$arr = [
    0 => 'По своей сути рыбатекст является альтернативой',
    1 => 'lorem ipsum, который вызывает у некторых людей недоумение'
];

task1($arr);
var_dump(task1($arr, true));
echo '<br>';
echo '<br>';

// Задание 2

task2( '-', 24, 5, 7, 3, 6);
task2( '+', 2, 2, 3);
//task2( '+', 2, 3, 4, 5, 6, 7, 8, 9);

// Задание 3

task3(3, 6);