<?php

/*  Задание 3.2
    Проверить, существует ли уже пользователь с таким email, если нет - создать его, если да - увеличить число заказов по этому email. Двух пользователей с одинаковым email быть не может.
    Сохранить данные заказа - id пользователя, сделавшего заказ, дату заказа, полный адрес клиента.
    Скрипт должен вывести пользователю:
    Спасибо, ваш заказ будет доставлен по адресу: “тут адрес клиента”
    Номер вашего заказа: #ID
    Это ваш n-й заказ!
    Где ID - уникальный идентификатор только что созданного заказа n - общий кол-во заказов, который сделал пользователь с этим email включая текущий
*/

try {
    $pdo = new PDO("mysql:host=localhost;dbname=test", 'root', 'root');
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}

// ** получение пользователя по id
$id = $_GET['id'] ?? 0;
if($id) {
    $ret = $pdo->query("SELECT * FROM `test_users` WHERE id=$id");

    if(!$ret) { //проверяем на успешность
        echo 'ERROR:';
        print_r($pdo->errorInfo()); die;
    }

    $user = $ret->fetchAll(PDO::FETCH_ASSOC);
}


// ** получение пользователя по почте
$id = $_GET['email'] ?? '';

if(!empty($_REQUEST['ajax'])) {
    header('Content-type: application/json');
    echo json_encode($user ? $user[0] : []);
}