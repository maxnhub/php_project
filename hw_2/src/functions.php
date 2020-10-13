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

function task2 (string $sign)
{
    $pre = 'Результат: ';
    $arr = [];
    $counter = '';
    if($sign == '+') {
        for ($i = 1; $i < func_num_args(); $i++) {
            $arr[$i] = func_get_arg($i);
            $counter += $arr[$i];
        }
        $string = implode(' + ', $arr);
        $final = $pre . $string . ' = ' . $counter;
    }
    elseif ($sign == '-') {
        for ($i = 1; $i < func_num_args(); $i++) {
            $arr[$i] = func_get_arg($i);
            if($counter != $arr[$i]) {
                $counter -= $arr[$i];
            }
        }
        $string = implode(' - ', $arr);
        $final = $pre . $string . ' = ' . $counter;
    } elseif ($sign == '/') {
        for ($i = 1; $i < func_num_args(); $i++) {
            $arr[$i] = func_get_arg($i);
            $counter /= $arr[$i];
        }
        $string = implode(' / ', $arr);
        $final = $pre . $string . ' = ' . $counter;
    } elseif ($sign == '*') {
        for ($i = 1; $i < func_num_args(); $i++) {
            $arr[$i] = func_get_arg($i);
            $counter *= $arr[$i];
        }
        $string = implode(' * ', $arr);
        $final = $pre . $string . ' = ' . $counter;
    } else {
        $final = 'Такого математического знака не существует';
    }
    echo $final . '<br>';
}

//function task2($operator) {
//    $res = '';
//    $arr = [];
//    for ($i = 0; $i < func_num_args() - 1; $i++) {
//        $arr[$i] = func_get_arg($i+1);
//        var_dump(func_get_arg($i+1));
//    }
//    for ($i = 0; $i < count($arr); $i++)
//    {
//        if (!is_int($arr[$i])) {
//            echo '<h1 style="color:darkred;">ВНИМАНИЕ!</h1>Задание 2,- в массиве не число!';
//            exit;
//        }
//        switch ($operator) {
//            case '+':
//                for ($i = 0; $i < count($arr); $i++) {
//                    $res += $arr[$i];
//                }
//                return $res;
//                break;
//            case '-': for ($i = 0; $i < count($arr); $i++) {
//                $res -= $arr[$i];
//            }
//                return $res;
//                break;
//            case '*':
//                for ($i = 0; $i < count($arr); $i++) {
//                    if ($res != '') {
//                        $res *= $arr[$i];
//                    } elseif ($res == '') {
//                        $res = $arr[$i];
//                    }
//                }
//                return $res;
//                break;
//            case '/':
//                for ($i = 0; $i < count($arr); $i++) {
//                    if ($arr[$i] == 0) {
//                        echo 'На нуль делить нельзя';
//                        exit;
//                    }
//                    if ($res != '') {
//                        $res /= $arr[$i];
//                    } elseif ($res == '') {
//                        $res = $arr[$i];
//                    }
//                } return $res;
//                break;
//            default: echo 'Неизвестные данные';
//        }
//    }
//}

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
