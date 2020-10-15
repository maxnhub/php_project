<?php

// 8 data Types

// 1. int
$int = 123;

// 2. float
$float = 2.15;

// 3. string
$str = 'Some text';

// 4. boolean
$bool = true;

// 5. array
$arr = [1, 2, 3];

// 6. object
class MyClass {}
$object = new MyClass();

// 7. resource
//$file = fopen('C:/test', 'r');
//$file = fopen('C:/test', 'w+');

// 8. null
// var_dump(null);

// ****************************************************

// Адский пример приоритетности операторов

$a = 1;
$a += ++$a + $a++;
// сначала преинкремент
// $a += 2 + $a++;
// затем $a становится везде равен 2
// $a += 2 + 2++;
// затем $a становится везде равен 2
// 2 += 2 + 3;
// и это выражение становится
// $a = 7

// $a = 7
var_dump($a++);
// 7, постинкремент делает из $a = 8

// $a = 8, преинкремент делает из $a = 9
var_dump(++$a);
// 9

// ******************************************************

// включаем отображение ошибок
ini_set('display_errors', 'on');
// говорим интерпретатору какие виды ошибок мы хотим отображать (все виды)
error_reporting(E_ALL | E_NOTICE);

$a = 123;
$b = 'string';

// функция isset() вовзращает bool, существует ли переменная

var_dump(isset($a));

// функция empty() переменная не существует или пустая

var_dump(empty($a));
var_dump(empty($c));

// функции проверки на тип данных (есть на все типы данных)

var_dump(is_int($a));
var_dump(is_int($b));
var_dump(is_string($a));
var_dump(is_string($b));

// strlen() длина строки в байтах (Кириллица мультибайтная для неё mb_strlen())

var_dump(strlen('Dima'));
var_dump(strlen('Дима'));
var_dump(mb_strlen('Дима', 'utf-8'));

// strpos() позиция в строке, для Кириллицы mb_strpos()

$string = 'Something interesting stuff';
$subString = 'stuff';

var_dump([
    'strpos' => strpos($string, $subString)
]);

// str_replace() заменяет одну строку в другой

var_dump([
    'str_replace' => str_replace('interesting', 'boring', $string)
]);

// explode() разделяет строку на массив, используя какой-либо символ как разделитель
// implode() сщбирает массив из строки

echo '<pre>';
var_dump([
    'explode' => explode(',', 'Кусочек хлеба, ломтик сыра, лист салата, кружлчек колбасы, кружочек помидорки, ломтик огурца')
]);
echo '</pre>';

echo '<pre>';
var_export($arr = [
    'explode' => explode(', ', 'Кусочек хлеба, ломтик сыра, лист салата, кружлчек колбасы, кружочек помидорки, ломтик огурца')
]);
$exploded = explode(', ', 'Кусочек хлеба, ломтик сыра, лист салата, кружлчек колбасы, кружочек помидорки, ломтик огурца');

echo '<pre>';
var_dump(implode(', ', $exploded));
echo '</pre>';
;

// strtoupper() и strtolower преобразует строку в верхний или нижний регистр
// ucfirst() и lcfirst() только первый символ строки

var_dump(strtoupper('Кусочек хлеба, ломтик сыра, лист салата, кружлчек колбасы, кружочек помидорки, ломтик огурца'));

// substr() вырезает часть строки

$string = '0123456789';
var_dump(substr($string, 5, 3));

// хэш-функции, md5 или sha1 обычно хэшируют пользовательские пароли и уже в хэшированном виде хранят в БД

echo '<pre>';
var_dump([
    'md5' => md5($string),
    'crc32' => crc32($string),
    'sha1' => sha1($string),
]);
echo '</pre>';


//***********************************************************

// Функции даты и времени

echo time(); // количество секунд, прошедшее с 1 января 1970 года
echo '<br>';
// задать регион для корректного времени и даты след.функцией нужно до функции date()
date_default_timezone_set('Europe/Moscow');
echo date('Y-m-d H:i:s');
echo '<br>';

echo date('Y-m-d H:i:s', time() + 3 * 86400); // на 3 дня вперёд, 86400 секунд в сутках
echo '<br>';

var_dump(date_default_timezone_get()); // текущая дата

// strtotime() перевод даты и времени в Unix формат

$date = strtotime('24.02.2016 00:00:00');
echo '<br>';
//***********************************************************

// Функции для работы с массивами

$users = [
    'name' => 'Dima',
    'lastname' => 'Dimov',
    'age' => 32
];

// array_values()

var_dump(array_values($users));
echo '<br>';
// array_keys()

var_dump(array_keys($users));
echo '<br>';

// array_column(), array_combine()

var_dump(array_column($users, 'age', 'name'));
echo '<br>';

$keys = ['key1','key2','key3'];
$values = [1, 2, 3];
var_dump(array_combine($keys, $values));
echo '<br>';
// array_key_exists()

$newArray = array_combine($keys, $values);
if(array_key_exists('key4', $newArray)) {
    echo 'Ключ найден';
} else {
    echo 'Ключ не найден';
}
echo '<br>';

// array_flip() меняет ключи со значениями местами

var_dump(array_flip($newArray));
echo '<br>';

// array_map() возвращает новый массив

var_dump($newUsers = array_map(function ($user) {
    $user['city'] = mt_rand(1, 100);
    return $user;
}, $users));
echo '<br>';

// array_walk() возвращает исходный массив

var_dump(array_walk($users, function ($user) {
    $user['name'] - 'Masha';
    return $user;
}));
echo '<br>';

// array_merge()

$intArr_1 = [1, 2, 3];
$intArr_2 = [4, 5, 6, 7];

$assocArr_1 = ['k1' => 1,'k2' => 2,'k3' => 3 ];
$assocArr_2 = ['k2' => 11,'k3' => 22,'k4' => 33 ];

var_dump([
    'array_merge_int' => array_merge($intArr_1, $intArr_2),
    '+_int' => $intArr_1 + $intArr_2,
    'array_merge_assoc' => array_merge($assocArr_1, $assocArr_2),
    '+_assoc' => $assocArr_1 + $assocArr_2,
]);
echo '<br>';

// array_diff()

var_dump(array_diff([1, 2, 3, 4, 5], [2, 5]));
echo '<br>';

// array_diff_assoc()

$assocArr_3 = ['k1' => 1,'k2' => 2,'k3' => 3 ];
$assocArr_4 = ['k2' => 1,'k3' => 22,'k4' => 3 ];
var_dump(array_diff_assoc($assocArr_3, $assocArr_4));
echo '<br>';

// sort(), ksort(), rsort(), asort(), usort()

// сортировка массивов


