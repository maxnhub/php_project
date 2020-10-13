<?php

// Задача 1

$name = 'Максим';
$age = '28';

echo('Меня зовут: ' . $name . '<br>');
echo('Мне ' . $age . ' лет' . '<br>');
print_r('“!|' . '\\' . '/’”' . '\\' . '<br>');
print_r('<br>');

// Задача 2

const PICTURES = 80;
const MARKERS = 23;
const PENCILS = 40;

$paints = PICTURES - (MARKERS + PENCILS);
print_r('paints = ' . PICTURES . ' - (' . MARKERS . ' + ' . PENCILS . ')' . '<br>');
print_r('paints = ' . $paints . '<br>');
print_r('<br>');

// Задача 3

$age = mt_rand(0, 100);
print_r('age = ' . $age . '<br>');
if ($age <= 65 && $age >= 18) {
    print_r('Вам еще работать и работать' . '<br>');
} elseif ($age > 65) {
    print_r('Вам пора на пенсию' . '<br>');
} elseif ($age > 0 && $age < 18) {
    print_r('Вам еще рано работать' . '<br>');
} else {
    print_r('Неизвестный возраст' . '<br>');
}
print_r('<br>');

// Задача 4

$day = mt_rand(0, 7);
print_r('day = ' . $day . '<br>');
switch ($day) {
    case 1:
        print_r('Это рабочий день' . '<br>');
        break;
    case 2:
        print_r('Это рабочий день' . '<br>');
        break;
    case 3:
        print_r('Это рабочий день' . '<br>');
        break;
    case 4:
        print_r('Это рабочий день' . '<br>');
        break;
    case 5:
        print_r('Это рабочий день' . '<br>');
        break;
    case 6:
        print_r('Это выходной день' . '<br>');
        break;
    case 7:
        print_r('Это выходной день' . '<br>');
        break;
    default:
        print_r('Неизвестный день' . '<br>');
        break;
}
print_r('<br>');

// Задача 5

$bmw = [
    'model' => 'X5',
    'speed' => 120,
    'doors' => 5,
    'year'  => '2015'
];

$toyota = [
    'model' => 'Camry',
    'speed' => 110,
    'doors' => 5,
    'year'  => '2016'
];

$opel = [
    'model' => 'Astra',
    'speed' => 100,
    'doors' => 3,
    'year'  => '2012'
];

$bigarr = [
    'bmw' => $bmw,
    'toyota' => $toyota,
    'opel' => $opel
];

foreach ($bigarr as $k => $v) {
    echo '<br>';
    echo 'CAR ' . $k . '<br>';
    foreach ($v as $v2) {
        echo $v2 . ' ';
    }
    echo '<br>';
}

// Задача 6
echo '<table border="1">';
for($i=1; $i<=10; $i++) {
    echo '<br>';
    echo '<tr>';
    for($j=1;$j<=10;$j++) {
        $result = $i * $j;
        if(($i % 2) == 0 && ($j % 2) == 0) {
            echo '<td style="padding: 10px; text-align: center;">(' . $result . ')</td>';
        } elseif (($i % 2) == 1 && ($j % 2) == 1) {
            echo '<td style="padding: 10px; text-align: center;">[' . $result . ']</td>';
        } else {
            echo '<td style="padding: 10px; text-align: center;">' . $result . '</td>';
        }
    }
    echo '</tr>';
}
echo '</table>';