<?php

// Задание 1

function task1 (array $arr, $bool = false)
{
    if ($bool == false) {
        for($i=0;$i<=count($arr);$i++) {
            echo '<p style="margin: 0;">' . $arr[$i] . '</p><br>';
        }
    } else {
        $string = implode(' ', $arr);
        return $string;
    }
}

// Задание 2

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

function task3 (int $arg1, int $arg2)
{
    $arg1 = abs($arg1);
    $arg2 = abs($arg2);
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

function task4 ()
{

}

function task5 ()
{

}

function task6 ()
{

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
