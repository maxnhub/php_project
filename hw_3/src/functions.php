<?php

/*  Задание 1
    Программно создайте массив из 50 пользователей, у каждого пользователя есть поля id, name и age:
    id - уникальный идентификатор, равен номеру эл-та в массиве
    name - случайное имя из 5-ти возможных (сами придумайте каких)
    age - случайное число от 18 до 45
    Преобразуйте массив в json и сохраните в файл users.json
    Откройте файл users.json и преобразуйте данные из него обратно ассоциативный массив РНР.
    Посчитайте количество пользователей с каждым именем в массиве
    Посчитайте средний возраст пользователей
*/

$users = [];
const QUANTITY_OF_USERS = 50;
const LEGAL_AGE = 18;
const ADULT_AGE = 45;

function task1()
{
    $names = [
        [
            'name' => 'Geralt',
            'count' => 0
        ],
        [
            'name' => 'Yennifer',
            'count' => 0
        ],
        [
            'name' => 'Triss',
            'count' => 0
        ],
        [
            'name' => 'Lutik',
            'count' => 0
        ],
        [
            'name' => 'Roach',
            'count' => 0
        ],
    ];
    $usersMiddleAge = 0;
    for ($i = 0; $i <= QUANTITY_OF_USERS; $i++) {
        $users[$i]['id'] = $i;
        $randomName = mt_rand(0, count($names)-1);
        $users[$i]['name'] = $names[$randomName]['name'];
        $names[$randomName]['count'] += 1;
        $users[$i]['age'] = mt_rand(LEGAL_AGE, ADULT_AGE);
        $usersMiddleAge += $users[$i]['age'];
    }
    file_put_contents('users.json', json_encode($users));
    $usersData = file_get_contents('users.json');
    $assocUsers = json_decode($usersData, true);
    for ($i = 0; $i < count($names); $i++) {
        echo $names[$i]['count'] . ' users with name ' . $names[$i]['name'] . '<br>';
    }
    echo 'Middle age of users ' . $usersMiddleAge/count($users);
}

/*  Задание 2
    Проверить, существует ли уже пользователь с таким email, если нет - создать его, если да - увеличить число заказов по этому email. Двух пользователей с одинаковым email быть не может.
    Сохранить данные заказа - id пользователя, сделавшего заказ, дату заказа, полный адрес клиента.
    Скрипт должен вывести пользователю:
    Спасибо, ваш заказ будет доставлен по адресу: “тут адрес клиента”
    Номер вашего заказа: #ID
    Это ваш n-й заказ!
    Где ID - уникальный идентификатор только что созданного заказа n - общий кол-во заказов, который сделал пользователь с этим email включая текущий
*/

function task2()
{

}
