<?php

// Задание 1

/*
Функция должна принимать массив строк и выводить каждую строку в отдельном параграфе (тег <p>)
Если в функцию передан второй параметр true, то возвращать (через return) результат в виде одной объединенной строки.
*/

function task1 (array $arr, $bool = false)
{
    if ($bool == false) {
        for($i=0;$i<=count($arr);$i++) {
            echo '<p style="margin: 0;">' . $arr[$i] . '</p><br>';
        }
    } else {
        return implode(' ', $arr);
    }
}

// Задание 2
/*
Функция должна принимать переменное число аргументов.
Первым аргументом обязательно должна быть строка, обозначающая арифметическое действие, которое необходимо выполнить со всеми передаваемыми аргументами.
Остальные аргументы это целые и/или вещественные числа.
*/

function task2($operator)
{
    $args = func_get_args();
    $result = 'Результат: ';
    $counter = 0;
    $string = '';
    if ($operator == '+') {
        for ($i = 1; $i < sizeof($args); $i++) {
            $counter += $args[$i];
        }
        $nums = array_shift($args);
        $string = implode(' + ', $args);
    } elseif ($operator == '-') {
        $counter = 0;
        for ($i = 1; $i <= 1; $i++) {
            $counter += $args[$i];
        }
        for($j = 2; $j < sizeof($args); $j++) {
            $counter -= $args[$j];
        }
        $nums = array_shift($args);
        $string = implode(' - ', $args);
    } elseif ($operator == '*') {
        $counter = 1;
        for ($i = 1; $i < sizeof($args); $i++) {
            $counter *= $args[$i];
        }
        $nums = array_shift($args);
        $string = implode(' * ', $args);
    } elseif ($operator == '/') {
        $counter = 0;
        for ($i = 1; $i <= 1; $i++) {
            $counter += $args[$i];
        }
        for($j = 2; $j < sizeof($args); $j++) {
            $counter /= $args[$j];
        }
        $nums = array_shift($args);
        $string = implode(' / ', $args);
    } else {
        echo 'Неизвестные данные';
    }
    return $result . $string . ' = ' . $counter;
}

// Задание 3

/*
Функция должна принимать два параметра – целые числа.
Если в функцию передали 2 целых числа, то функция должна отобразить таблицу умножения размером со значения параметров, переданных в функцию. (Например если передано 8 и 8, то нарисовать от 1х1 до 8х8). Таблица должна быть выполнена с использованием тега <table>
В остальных случаях выдавать корректную ошибку.
*/

function task3 (int $arg1, int $arg2)
{
    if ($arg1 < 1 || $arg2 < 1) {
        echo 'Введите целые числа';
        return null;
    }
    echo '<table border="1">';
    for($i=1; $i<=$arg1; $i++) {
        echo '<br>';
        echo '<tr>';
        for($j=1;$j<=$arg2;$j++) {
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
}

// Задание 4

/*
Выведите информацию о текущей дате в формате 31.12.2016 23:59
Выведите unixtime время соответствующее 24.02.2016 00:00:00.
*/

function task4 ()
{
    date_default_timezone_set('Europe/Moscow');
    echo date('d.m.Y H:i');
    echo '<br>';
    $time = strtotime('24.02.2016 00:00:00');
    echo $time;
    echo '<br>';
}

// Задание 5

/*
Дана строка: “Карл у Клары украл Кораллы”. Удалить из этой строки все заглавные буквы “К”.
Дана строка: “Две бутылки лимонада”. Заменить “Две”, на “Три”.
*/

function task5($string, $anotherString)
{
    var_dump(
        str_replace('К', '', $string)
    );
    echo '<br>';
    var_dump(
        str_replace('Две', 'Три', $anotherString)
    );
    echo '<br>';
}

// Задание 6

/*
Создайте файл test.txt средствами PHP. Поместите в него текст - “Hello again!”
Напишите функцию, которая будет принимать имя файла, открывать файл и выводить содержимое на экран.
*/

function task6 ()
{
    $data = file_get_contents('src/test.txt');
    var_dump($data);
    echo '<br>';
}

function task7 ()
{

}

function task8 ()
{

}

function task9 ()
{

}

function task10 ()
{

}


